<?php

class ProductModel extends Connection
{

  public function getDataFromAPI($slug)
  {
    $m = $this->db();
    $server_url = PHOTO_API_URL;
    $url = "{$server_url}/api/product/get-product-by-slug/{$slug}/";

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


    $today = new DateTime();

    $product_db_q = "SELECT * from `ang_product_api` WHERE slug=?";
    $t = $m->prepare($product_db_q);
    $t->execute(array($slug));

    $mysql_result = $t->fetch(PDO::FETCH_ASSOC);
    if (!$mysql_result) {
      $this->insertOrUpdateProduct($mydata);
    } else {
      $past = new DateTime($mysql_result['updated']);
      $interval = $today->diff($past)->days;
      if ($interval > 1) {
        $this->insertOrUpdateProduct($mydata);
      }
      $mydata = json_decode($mysql_result['product_json'], true);
    }

    return $mydata;
  }


  private function insertOrUpdateProduct($product)
  {
    /**
     * Insetting product for cache into mysql or 
     * updates it if exists,
     * changes once a day
     */

    $m = $this->db();

    $updated = date("Y-m-d H:i:s");
    $slug = $product['slug'];
    $product_json = json_encode($product);

    $q = "INSERT INTO ang_product_api
    (slug, product_json, updated)
     VALUES
     (?, ?, ?)
     AS new
    ON DUPLICATE KEY UPDATE
    slug = new.slug,
    product_json = new.product_json,
    updated = new.updated
    ";
    $t = $m->prepare($q);
    $t->execute(array($slug, $product_json, $updated));
  }
  /////////////////////////////////////////////////////////////////////////
  public function getCatalogue($cat_number, $car)
  {
    /**
     * Function get data from catalogue fro product card
     */
    $prefix = $this->prfixes[mb_strtolower($car, 'UTF-8')] ?? NULL;
    $m = $this->db();
    $table = 'ang_catalogue_' .  $prefix . '_h3';
    $table2 = 'ang_catalogue_' . $prefix . '_h4';
    $table3 = 'ang_catalogue_' . $prefix . '_h5';
    //$q = 'SELECT * FROM '.$table.' WHERE `id_h3` = ?';
    $q = 'SELECT DISTINCT a.*,b.img as img2 FROM ' . $table . ' a
           JOIN ' . $table2 . ' b ON a.id=b.id_h3
           JOIN ' . $table3 . ' c ON b.id=c.id_h4
           WHERE c.numer LIKE ?';
    $t = $m->prepare($q);
    try {
      $t->execute(array($cat_number));
      $data = $t->fetch(PDO::FETCH_ASSOC);
      // $car_id = $this->car_id[mb_strtolower($car, 'UTF-8')];
      return ['data' => $data, 'prefix' => $prefix];
    } catch (Exception $e) {
      return false;
    }
  } //Конец функции

  public function getCars($make_slug)
  {
    /**
     * Gegging all cars for specific make for side snippet
     */

    $m = $this->db();
    $q = "SELECT car_json FROM ang_cars_api WHERE JSON_EXTRACT(car_json, '$.make.slug') = ?";
    $t = $m->prepare($q);
    $t->execute(array($make_slug));
    $result = $t->fetchAll(PDO::FETCH_ASSOC);
    $cars = [];
    if ($result) {
      foreach ($result as $item) {
        $i = json_decode($item['car_json'], true);
        unset($i['categories']);
        unset($i['model_to']);
        unset($i['model_to']);
        unset($i['model_hostory']);
        unset($i['model_liquids']);
        $cars[] = $i;
      }
    }
    return $cars;
  }

  private $car_id = [
    'портер1' => '1',
    'hd' => '2',
    'hd72' => '2',
    'hd78' => '2',
    'hd160' => '2',
    'hd170' => '2',
    'hd260' => '2',
    'hd270' => '2',
    'hd450' => '2',
    'hd500' => '2',
    'старекс' => '3',
    'Ман' => '4',
    'портер2' => '5',
    'транзит' => '6',
    'транспортер' => '7',
    'боксер' => '8',
    'скания' => '9',
    'дукато' => '10',
    'джампер' => '11',
    'вольво' => '12',
    'ивеко' => '13',
    'солярис' => '14',
    'истана' => '16',
    'кайрон' => '17',
    'оптима' => '18',
    'рекстон' => '19',
    'рио' => '20',
    'сантафе' => '21',
    'соната' => '22',
    'соренто' => '23',
    'спортейдж' => '24',
    'сид' => '25',
    'актион' => '26',
    'солярис' => '12',
    'solaris' => '12'
  ];

  private $prfixes = [
    'porter1' => 'porter1',
    'porter2' => 'porter2',
    'hd65' => 'hd',
    'hd120' => 'hd',
    'bogdan' => 'hd',
    'county' => 'hd',
    'hd72' => 'hd',
    'hd78' => 'hd',
    'hd160' => 'hd',
    'hd170' => 'hd',
    'hd260' => 'hd',
    'hd270' => 'hd',
    'hd450' => 'hd',
    'hd500' => 'hd',
    'starex' => 'starex',
    'optima' => 'optima',
    'santafe' => 'santafe',
    'sonata' => 'sonata',
    'sorento' => 'sorento',
    'sporta' => 'sportage',
    'ceed' => 'ceed',
    'solaris' => 'solaris'
  ];
}
