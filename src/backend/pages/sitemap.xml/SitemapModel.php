<?php


class SitemapModel extends Connection
{
  // All Categories
  private $all_cats_url = PHOTO_API_URL .  "/api/product/get-all-categories-flat/";
  // All car models 
  private $all_models_url = PHOTO_API_URL .  "/api/product/getcarmodelsiteall/";
  // All products
  private $all_products_url =  PHOTO_API_URL . "/api/product/merchant/";

  private $host = COMPANY_INFO['site'];

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

  public function staticPages()
  {
    /**
     * Return array of static pages
     */
    $u = new Url;
    $pages =  [
      $u->home(),
      $u->blog(),
      $u->delivery(),
      $u->contacts(),
      $u->policy(),
      $u->about(),
      $u->garranty()
    ];
    return array_map(fn ($url) => $this->host . $url, $pages);
  }

  public function categoriesPages()
  {
    /**
     * Return all categories urls
     */
    $u = new Url;
    $api_data = json_decode($this->getApi($this->all_cats_url), true);
    return array_map(fn ($item) => $this->host . $u->category($item['slug']), $api_data);
  }

  public function carsCategoriesPages()
  {
    /**
     * Getting category/model/categoryslug/ url from mysql
     * 
     */
    $m = $this->db();
    $q = "SELECT * FROM `ang_cars_api`";
    $t = $m->prepare($q);
    $t->execute();
    $data = $t->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $car) {
      $car_data = json_decode($car['car_json'], true);
      p($car_data);
    }
  }
}
