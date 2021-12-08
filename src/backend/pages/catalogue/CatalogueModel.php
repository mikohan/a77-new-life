<?php

class CatalogueModel extends Connection
{
  public function getCatalogue($car_slug)
  {
    /**
     * Getting catalogue by car
     */
    $m = $this->db();
    $table = "ang_catalogue_" . $car_slug . "_h2";
    $q = "SELECT * FROM " . $table . "";
    $t = $m->prepare($q);
    $t->execute();
    $result = $t->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
  public function getCatalogueSubcat($car_slug, $parent)
  {
    /**
     * Getting second level of catalogues
     */
    $m = $this->db();
    $table = "ang_catalogue_" . $car_slug . "_h3";
    $q = "SELECT * FROM " . $table . " WHERE id_h2 = ?";
    $t = $m->prepare($q);
    $t->execute(array($parent));
    $result = $t->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
  public function getSchemaTitle($car_slug, $id)
  {
    /**
     * Getting title from h3 for tilte page schem and breadcrumbs
     */

    $m = $this->db();
    $table = "ang_catalogue_" . $car_slug . "_h3";
    $q = "SELECT * FROM " . $table . " WHERE id = ?";
    $t = $m->prepare($q);
    $t->execute(array($id));
    $result = $t->fetch(PDO::FETCH_ASSOC);
    return $result;
  }
  private function getCatalogueSchema($car_slug, $schema)
  {
    /**
     * Getting second level of catalogues
     */
    $m = $this->db();
    $table = "ang_catalogue_" . $car_slug . "_h4";
    $table_h5 = "ang_catalogue_" . $car_slug . "_h5";

    $q = "SELECT h4.id as h4_id, h4.coords, h4.id_h3, h4.img, h4.title as h4_title, h5.id as h5_id, h5.numer as h5_cat_number, h5.count FROM " . $table . " as h4
    LEFT JOIN {$table_h5} as h5
    
    ON h4.id = h5.id_h4
    WHERE id_h3 = ?";
    $t = $m->prepare($q);
    $t->execute(array($schema));
    $result = $t->fetchAll(PDO::FETCH_ASSOC);
    // Second part adding data to return if exists on catalogue
    return $result;
  }

  public function getSchemaWithProducts($car_slug, $schema_id)
  {
    /**
     * Merge arrays to return all data with prices and names
     */

    $cat_array = $this->getCatalogueSchema($car_slug, $schema_id);
    $res = [];
    $cat_numbers = [];
    foreach ($cat_array as $ca) {
      $cat_numbers[] = $ca['h5_cat_number'];
    }

    $json = $this->getJson($car_slug, $schema_id);
    if ($json) {
      foreach ($cat_array as $c) {
        foreach ($json as $j) {
          if ($c['h5_cat_number'] == $j['cat_number']) {
            $c['products'][] = $j;
          }
        }
        $res[] = $c;
      }
      return $res;
    } else {
      $res = [];
      $products = $this->getProductsByCatNumbers($schema_id, $car_slug, $cat_numbers);
      foreach ($cat_array as $c) {
        $cat_numbers[] = $c['h5_cat_number'];
        foreach ($products as $j) {
          if ($c['h5_cat_number'] == $j['cat_number']) {
            $c['products'][] = $j;
          }
        }
        $res[] = $c;
      }
      return $res;
    }
  }

  private function getJson($car_slug, $shema_id)
  {
    /**
     * Getting cached data from mysql json 
     */
    $m = $this->db();
    $q = "SELECT b.name, b.price, b.brand, b.cat_number FROM ang_api_catalogue_cache a
    CROSS JOIN JSON_TABLE(a.products_json, '$[*]' COLUMNS
                      (`name` VARCHAR(50) PATH '$.name',
                      price VARCHAR(50) PATH '$.price',
                      cat_number VARCHAR(50) PATH '$.cat_number',
                      NESTED PATH '$.brand'
                      COLUMNS (brand VARCHAR(30) PATH '$.brand')
                      )) b
    WHERE car_slug = ? AND sch_id=?";

    $t = $m->prepare($q);
    $t->execute(array($car_slug, $shema_id));
    $data = $t->fetchAll(PDO::FETCH_ASSOC);
    if ($data) {
      return $data;
    } else {
      return false;
    }
  }

  public function getProductsByCatNumbers($schema_id, $car_slug, $cat_numbers)
  {
    /**
     * Getting cat numbers from API for catalogue page schema
     */

    //Get data from mysql

    $today = new DateTime();
    $m = $this->db();
    $product_db_q = "SELECT * from `ang_api_catalogue_cache` WHERE car_slug=? AND sch_id=?";
    $t = $m->prepare($product_db_q);
    $t->execute(array($car_slug, $schema_id));
    $mysql_result = $t->fetch(PDO::FETCH_ASSOC);


    $past = new DateTime($mysql_result['updated'] ?? null);
    $interval = $today->diff($past)->days;

    if (!$mysql_result || $interval > 1) {
      $params = '';
      foreach ($cat_numbers as $number) {
        $params .= "numbers=" . $number . "&";
      }
      $params = rtrim($params, '&');

      $server_url = PHOTO_API_URL;
      // Needs to refactor url
      // $url = "{$server_url}/api/product/get-products-by-numbers/?{$params}";
      $url = "http://localhost:8000/api/product/get-products-by-numbers/?{$params}";

      //  Initiate curl
      $ch = curl_init($url);
      $options = array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array('Content-type: application/json')
      );
      curl_setopt_array($ch, $options);
      $result = curl_exec($ch);
      $mydata = json_decode($result, true);
      curl_close($ch);
      $this->insertOrUpdateCatalogue($mydata, $car_slug, $schema_id);
    } else {
      $mydata = json_decode($mysql_result['products_json'], true);
    }

    return $mydata;
  }

  private function insertOrUpdateCatalogue($product,  $car_slug, $schema_id)
  {
    /**
     * Insetting product for cache into mysql or 
     * updates it if exists,
     * changes once a day
     */

    $m = $this->db();

    $updated = date("Y-m-d H:i:s");
    $product_json = json_encode($product);

    $q = "INSERT INTO ang_api_catalogue_cache
    (sch_id, products_json, updated, car_slug)
     VALUES
     (?, ?, ?, ?)
     AS new
    ON DUPLICATE KEY UPDATE
    sch_id = new.sch_id,
    products_json = new.products_json,
    updated = new.updated,
    car_slug = new.car_slug
    ";
    $t = $m->prepare($q);
    $t->execute(array($schema_id, $product_json, $updated, $car_slug));
  }
  /////////////////////////////////////////////////////////////////////////

  function splitArray(array $input_array, int $size, $preserve_keys = null): array
  {
    $nr = (int)ceil(count($input_array) / $size);

    if ($nr > 0) {
      return array_chunk($input_array, $nr, $preserve_keys);
    }

    return $input_array;
  }
}
