<?php

class CarsModel extends Connection
{
  /**
   * Class for home page
   */

  private function getFeaturesFromApi($car_slug)
  {
    $host = PHOTO_API_URL;
    $url = "{$host}/api/product/get-home-page-features/{$car_slug}/";
    // $url = 'http://localhost:8000/api/product/get-home-page-features/';
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

  private function getFeaturesFromMysql($car_slug)
  {
    /**
     * Trying get features from mysql database
     * if no data or dat is expired 
     * Call api
     * Save data to mysql
     */



    $m = $this->db();
    $q = "SELECT * FROM ang_cars_page WHERE slug = ?";
    $t = $m->prepare($q);
    $t->execute(array($car_slug));
    $res = $t->fetch(PDO::FETCH_ASSOC);
    if ($res) {
      $today = new DateTime();
      $past = new DateTime($res['updated'] ?? null);
      $interval = $today->diff($past)->days;
      if ($interval < 1) {
        return $res['json_data'];
      } else {
        return false;
      }
    } else {
      return false;
    }
  }


  private function insertOrUpdateMysqlHomePage($json_data, $car_slug)
  {
    /**
     * Updates home page if expired or non exists
     */

    $updated = date("Y-m-d H:i:s");

    $m = $this->db();
    $q = "INSERT INTO ang_cars_page  (slug, json_data, updated)
    VALUES (?, ?, ?) as vals
    ON DUPLICATE KEY UPDATE
    slug = vals.slug,
    json_data = vals.json_data,
    updated = vals.updated
    ";
    $t = $m->prepare($q);
    $t->execute(array($car_slug, $json_data, $updated));
  }
  public function getProductsForHomePage($car)
  {
    /**
     * Getting featured products for home page
     * 1) Go to db
     * 2) If false go API
     * 3) Save to db and send to a page
     */
    $car_slug = $car['slug'];
    $products = $this->getFeaturesFromMysql($car_slug);
    if ($products) {
      return json_decode($products, true);
    } else {
      $products = $this->getFeaturesFromApi($car_slug);
      $this->insertOrUpdateMysqlHomePage($products, $car_slug);
      return json_decode($products, true);
    }
  }

  public function getLatestPosts()
  {
    /**
     * Getting 6 latest posts from db
     */

    $m = $this->db();

    $q = "SELECT ab.*, bc.name as blog_category_name FROM ang_blog_articles ab
    LEFT JOIN ang_blog_category bc
    ON ab.blog_category = bc.id
     ORDER BY date DESC LIMIT 6";
    $t = $m->prepare($q);
    $t->execute();
    $res = $t->fetchAll(PDO::FETCH_ASSOC);
    return $res;
  }
}
