<?php

use Spatie\Async\Pool;

class YandexXmlModel extends Connection
{
  // All Categories
  private $all_cats_url = PHOTO_API_URL .  "/api/product/get-all-categories-flat/";
  // All products
  private $all_products_url =  PHOTO_API_URL . "/api/product/jsontest-a77-yandex-markety-xml";

  private $host = ANG_HTTP;

  private function getApi($url)
  {

    $ch = curl_init();
    $options = array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HTTPHEADER => array('Content-type: application/json')
    );
    curl_setopt_array($ch, $options);

    $result = curl_exec($ch);
    // $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $mydata = $result;
    curl_close($ch);
    return $mydata;
  }

  public function categoriesPages()
  {
    /**
     * Return all categories urls
     */
    $u = new Url;
    $api_data = json_decode($this->getApi($this->all_cats_url), true);
    return  $api_data;
  }

  public function getProducts()
  {
    /**
     * Getting products from api and return products urls
     */
    $u = new Url;
    $data = json_decode($this->getApi($this->all_products_url), true);
    return $data;
  }
}
