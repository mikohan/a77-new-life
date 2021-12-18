<?php

use Spatie\Async\Pool;

class SitemapModel extends Connection
{
  // All Categories
  private $all_cats_url = PHOTO_API_URL .  "/api/product/get-all-categories-flat/";
  // All products
  private $all_products_url =  PHOTO_API_URL . "/api/product/product-sitemap-list/";

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

  private function staticPages()
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

  private function categoriesPages()
  {
    /**
     * Return all categories urls
     */
    $u = new Url;
    $api_data = json_decode($this->getApi($this->all_cats_url), true);
    return array_map(fn ($item) => $this->host . $u->category($item['slug']), $api_data);
  }

  private function carsCategoriesPages()
  {
    /**
     * Getting category/model/categoryslug/ url from mysql
     * 
     */
    $u = new Url;
    $m = $this->db();
    $q = "SELECT * FROM `ang_cars_api`";
    $t = $m->prepare($q);
    $t->execute();
    $data = $t->fetchAll(PDO::FETCH_ASSOC);
    $urls = [];
    foreach ($data as $car) {
      $car_data = json_decode($car['car_json'], true);
      foreach ($car_data['categories'] as $category) {
        $url = $this->host . $u->categoryCar($car['slug'], $category['slug']);
        $urls[] = $url;
      }
    }
    return ($urls);
  }
  private function blogPostsPages()
  {
    /**
     * Return all articles from db
     */

    $u = new Url;
    $m = $this->db();
    $q = "SELECT slug FROM ang_blog_articles";
    $t = $m->prepare($q);
    $t->execute();
    $data = $t->fetchAll(PDO::FETCH_ASSOC);
    return array_map(fn ($item) => $this->host . $u->blogPost($item['slug']), $data);
  }
  private function productsPages()
  {
    /**
     * Getting products from api and return products urls
     */
    $u = new Url;
    $data = json_decode($this->getApi($this->all_products_url), true);
    return array_map(fn ($item) => $this->host . $u->product($item['slug']), $data);
  }




  public function makeMeHappy()
  {
    /**
     * Combine all array together and than return it
     */
    $return = [];
    $static_pages = $this->staticPages();
    $blog_post_pages = $this->blogPostsPages();
    $categories_pages = $this->categoriesPages();
    $cars_categories_pages = $this->carsCategoriesPages();
    $products_pages = $this->productsPages();
    $return = array_merge($static_pages, $blog_post_pages, $categories_pages, $cars_categories_pages, $products_pages);
    $return = array_map(fn ($item) => "<loc>" . $item . "</loc>", $return);

    return $return;
  }
}
