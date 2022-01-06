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
     * Getting catalogue schema lets call it cat_data
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



  private function getProductDataFromApi($car_slug, $cat_numbers)
  {
    /**
     * Getting product_data from API by cat numbers array
     */
    $params = '';
    foreach ($cat_numbers as $number) {
      $params .= "numbers=" . $number . "&";
    }
    $params = rtrim($params, '&');

    $server_url = PHOTO_API_URL;
    // Needs to refactor url
    $url = "{$server_url}/api/product/get-products-by-numbers/?{$params}";
    // $url = "http://localhost:8000/api/product/get-products-by-numbers/?{$params}";

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
    return $mydata;
  }

  private function mergeData($cat_data, $product_data)
  {
    /**
     * Merging data from cat and from API
     * returns merged array
     */

    foreach ($cat_data as $c) {
      foreach ($product_data as $j) {
        if ($c['h5_cat_number'] == $j['cat_number']) {
          if (count($j)) {
            $c['products'][] = $j;
          }
        }
      }
      $res[] = $c;
    }
    return $res;
  }

  private function makeCatNumberArray($cat_data)
  {
    /**
     * Return array of cat numbers present on the current scheme
     */
    $cat_numbers = array_map(function ($item) {
      return $item['h5_cat_number'];
    }, $cat_data);
    $return = array_unique(array_filter($cat_numbers, fn ($value) => !is_null($value) && $value !== ''));
    return $return;
  }



  private function insertOrUpdateMergedData(string $car_slug, int $schema_id, array $merged_data, array $product_data): void
  {
    /**
     * Insetting of updating merged data into a chache table
     */

    $m = $this->db();

    $updated = date("Y-m-d H:i:s");
    $product_json = json_encode($product_data);
    $merged_json = json_encode($merged_data);

    $q = "INSERT INTO ang_api_catalogue_cache
    (sch_id, products_json, merged_json, updated, car_slug)
     VALUES
     (?, ?, ?, ?, ?)
     AS new
    ON DUPLICATE KEY UPDATE
    sch_id = new.sch_id,
    products_json = new.products_json,
    merged_json = new.merged_json,
    updated = new.updated,
    car_slug = new.car_slug
    ";
    $t = $m->prepare($q);
    $t->execute(array($schema_id, $product_json, $merged_json, $updated, $car_slug));
  }





  public function getPageData($car_slug, $schema_id)
  {
    /**
     * 1)Check data in mysql cache table by schema id and car slug
     * 2) If there is a chahe in the table return it
     * 3) If not data in the table 
     * a)Retreive data from h4 and g5 table
     * b) Making cat_numbers array
     * c) Call API and retreive product data
     * d) Merge data return merged data
     * e) Save data to cache table
     * f) Return data to page
     */
    $m = $this->db();
    $chk_q = "SELECT sch_id,products_json,merged_json, updated FROM ang_api_catalogue_cache WHERE car_slug=? AND sch_id=?";
    $t = $m->prepare($chk_q);
    $t->execute(array($car_slug, $schema_id));
    $mysql_result = $t->fetch(PDO::FETCH_ASSOC);

    // Making interval
    $today = new DateTime();
    $past = new DateTime($mysql_result['updated'] ?? null);
    $interval = CATALOUGE_CACHE_LIFETIME;
    if ($mysql_result) {
      $interval = $today->diff($past)->days;
    }



    // Checking interval
    if ($interval < CATALOUGE_CACHE_LIFETIME) {
      // Return data from cache table
      // echo ('Got data from MysQl');
      return array(
        'merged_data' => json_decode($mysql_result['merged_json'], true), 'product_data' =>
        json_decode($mysql_result['products_json'], true)
      );
    } else {
      // Start chain of getting and saving data to cahche
      // echo ('Got data from API');
      // Getting cat_data from mysql
      $cat_data = $this->getCatalogueSchema($car_slug, $schema_id);
      // Getting cat_number array
      $cat_numbers = $this->makeCatNumberArray($cat_data);
      // Call API for product_data
      $product_data = $this->getProductDataFromApi($car_slug, $cat_numbers);
      // Merging product_data to cat_data
      $merged_data = $this->mergeData($cat_data, $product_data);
      // Saving data into cache table
      $this->insertOrUpdateMergedData($car_slug, $schema_id, $merged_data, $product_data);
      return array('merged_data' => $merged_data, 'product_data' => $product_data);
    }
  }



  function splitArray($input_array, int $size, $preserve_keys = null): array

  {
    /**
     * Function for getting chunks for bottom section with product cards
     */
    try {

      $nr = (int)ceil(count($input_array) / $size);
    } catch (Throwable $t) {
      return [];
    }

    if ($nr > 0) {
      return array_chunk($input_array, $nr, $preserve_keys);
    } else {
      return [];
    }
    if ($input_array) {
      return $input_array;
    }
  }
}
