<?php

class ProductModel extends Connection
{

  public function getDataFromAPI($slug)
  {
    $m = $this->db();
    $url = "http://localhost:8000/api/product/get-product-by-slug/{$slug}/";

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
      echo ("No reslut");
      $this->insertOrUpdateProduct($mydata);
    } else {
      p($result);
    }


    // if ($result['updated']) {
    //   $updated = $result['updated'];
    // } else {
    //   $updated = '2021-10-10 20:21:10';
    // }


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
}
