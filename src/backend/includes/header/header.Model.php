<?php

class ApiHeader extends Connection
{
  private function getCatsFromApi()
  {
    $host = PHOTO_API_URL;
    $url = "{$host}/api/product/get-all-categories-flat/";
    $ch = curl_init();
    $options = array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HTTPHEADER => array('Content-type: application/json')
    );
    curl_setopt_array($ch, $options);

    $result = curl_exec($ch);
    // $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $mydata = json_decode($result, true);
    curl_close($ch);
    return $mydata;
  }

  public function saveCatsToMysql()
  {
    $m = $this->db();
    $big_query = [];
    foreach ($this->getCatsFromApi() as $cat) {
      $cat['parent'] = $cat['parent'] ? $cat['parent'] : 0;
      $cat['cat_image'] = $cat['cat_image'] ? $cat['cat_image'] : '';
      $updated = date("Y-m-d H:i:s");

      $big_query[] = "
      ({$cat['id']},
      '{$cat['name']}',
      '{$cat['slug']}',
      '{$cat['cat_image']}',
      {$cat['level']},
      {$cat['parent']},
      '{$updated}')
      ";
    }
    $string = implode(",", $big_query);
    $q = "INSERT INTO ang_categories_api
    (id, `name`, slug, cat_image, `level`, parent, updated)
     VALUES
     {$string}
     AS new
    ON DUPLICATE KEY UPDATE
    name = new.name,
    slug = new.slug,
    cat_image = new.cat_image,
    `level` = new.level,
    parent = new.parent,
    updated = new.updated
    ";
    $t = $m->prepare($q);
    $t->execute();
  }
  public function getCategoriesFromMysql($slug = null)
  {
    /**
     * Function get categories from local db if slug has passed returned one category
     * if slug not passed returned all categories
     * it also checked if local db has updated more than one day ago
     * it updates the db from api
     */
    $m = $this->db();

    // Checking if table updated or not
    $today = new DateTime();
    $time_q = "SELECT updated from `ang_categories_api` LIMIT 1";
    $t = $m->prepare($time_q);
    try {
      $t->execute();
      $updated = $t->fetch(PDO::FETCH_ASSOC)['updated'];
    } catch (Exception $e) {
      // Pass for now
      $updated = date("Y-m-d H:i:s");
    }
    $past = new DateTime($updated);
    $interval = $today->diff($past)->days;
    // If interval less than one day update table
    try {

      if ($interval > 1) {
        $this->saveCatsToMysql();
      }
    } catch (Exception $e) {
    }

    if ($slug) {
      // Select category by slug
      $q = "SELECT * FROM `ang_categories_api` WHERE
          slug = ? ";
      $t = $m->prepare($q);
      $t->execute(array($slug));
      return $t->fetch(PDO::FETCH_ASSOC);
    } else {
      // Return all categories
      $q = "SELECT * FROM `ang_categories_api`";
      $t = $m->prepare($q);
      $t->execute();
      return $t->fetchAll(PDO::FETCH_ASSOC);
    }
  }
  private function getHeaderFromApi()
  {
    $host = PHOTO_API_URL;
    $url = "{$host}/api/product/jsontest-angara77-all-cars";
    $ch = curl_init();
    $options = array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HTTPHEADER => array('Content-type: application/json')
    );
    curl_setopt_array($ch, $options);

    $result = curl_exec($ch);
    // $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $mydata = json_decode($result, true);
    curl_close($ch);
    return $mydata;
  }
  private function saveCarsFromApiToMysql()
  {
    $cars_data = $this->getHeaderFromApi();
    $m = $this->db();
    $insert = '';
    $updated = date("Y-m-d H:i:s");
    foreach ($cars_data as $car) {
      $car_id = $car['id'];
      $car_d = json_encode($car);
      $car_slug = $car['slug'];
      $q = "INSERT INTO ang_cars_api (id, car_json, updated, slug)
      VALUES (?, ?, ?, ?) as val
      ON DUPLICATE KEY UPDATE
      car_json = val.car_json,
      updated = val.updated,
      slug = val.slug
      ";
      $t = $m->prepare($q);
      $t->execute(array($car_id, $car_d, $updated, $car_slug));
    }
  }
  public function getCarsFromApi($slug = null)
  {
    /**
     * Function get cars from local db if slug has passed returned one category
     * if slug not passed returned all categories
     * it also checked if local db has updated more than one day ago
     * it updates the db from api
     */
    $m = $this->db();

    // Checking if table updated or not
    $today = new DateTime();
    $time_q = "SELECT updated from `ang_cars_api` LIMIT 1";
    $t = $m->prepare($time_q);
    $t->execute();

    $result = $t->fetch(PDO::FETCH_ASSOC);
    if ($result) {
      $updated = $result['updated'];
    } else {
      $updated = '2021-10-10 20:21:10';
    }

    // Pass for now
    $past = new DateTime($updated);
    $interval = $today->diff($past)->days;
    // If interval less than one day update table
    try {
      if ($interval > 1) {
        echo 'Saving data to table';
        $this->saveCarsFromApiToMysql();
      }
    } catch (Exception $e) {
    }

    if ($slug) {
      // Select category by slug
      $q = "SELECT * FROM `ang_cars_api` WHERE
          slug = ? ";
      $t = $m->prepare($q);
      $t->execute(array($slug));
      $result = $t->fetch(PDO::FETCH_ASSOC);
      $return = json_decode($result['car_json']);
      return $return;
    } else {
      // Return all cars
      $q = "SELECT * FROM `ang_cars_api`";
      $t = $m->prepare($q);
      $t->execute();
      $results =  $t->fetchAll(PDO::FETCH_ASSOC);
      $return = [];
      foreach ($results as $result) {
        $return[] = json_decode($result['car_json']);
      }
      echo 'Get cars ffom Mysql';
      return $return;
    }
  }
}

class HeaderModel extends Connection
{

  // Getting All categories depending of car mode 
  public function getAllCategories($carOldNew)
  {
    if ($carOldNew === '1') {
      $q = 'SELECT id, ang_category as title FROM ang_categories';
    } else {
      $q =  "SELECT * FROM cat_subcat_group WHERE parent = 0";
    }
    $m = $this->db();

    $t = $m->prepare($q);
    $t->execute();
    $data = $t->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }

  public function getCategoryById($id, $carOldNew)
  // Getting category by id for both modes
  {
    $q = '';
    if ($carOldNew['old_view'] === '1') {
      $q = "SELECT a.id, a.ang_subcat as title, a.parent, COUNT(b.id) as parts_count
      FROM ang_subcategories a
      LEFT JOIN angara b
      ON a.id = b.parent
      WHERE a.parent = ?
      AND b.car LIKE CONCAT('%', ?)
      GROUP BY a.id
      HAVING COUNT(b.id) > 0";
    } else {
      // $q = $query = "SELECT * FROM cat_subcat_group WHERE parent = ? ";
      $q = "SELECT a.*, COUNT(b.id) as parts_count
      FROM cat_subcat_group a
      LEFT JOIN b_part_uniq b
      ON b.subcat_id LIKE CONCAT(',', a.id , '%')
      
      WHERE a.parent = ?
      AND cars LIKE CONCAT(',', ?, '%')
      GROUP BY a.id
      HAVING COUNT(b.id) > 0";
    }

    $m = $this->db();
    $t = $m->prepare($q);
    $car = $carOldNew['url'];
    $t->execute(array($id, $car));
    $data = $t->fetchAll(PDO::FETCH_ASSOC);


    // $_SESSION['menu_data_new'] = $data;

    return $data;
  }

  public function makeCache($cars)
  {

    $data = [];
    foreach ($cars as $i => $car) {
      $cats = $this->getAllCategories($car['old_view']);
      $data[] =  $car;
      foreach ($cats as $j => $cat) {
        $subcat = $this->getCategoryById($cat['id'], $car);
        $cat['subcat'][] = $subcat;

        $data[$i]['cat'][] =  $cat;
      }
    }
    return $data;
  }



  public function SelectAllCarEnabled($id)
  // Getting all cars
  {

    $m = $this->db();
    $q = 'SELECT * FROM b_cars_new WHERE enabled=1 ORDER BY sort';
    $t = $m->prepare($q);
    $t->execute();
    $data = $t->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }


  public function makeCategoryUrl($car, $category)
  // Producing urls for category level
  {

    $url_cat = '';

    if ($car['old_view'] == 1) {
      $name_url = str_ireplace('.', '', str_ireplace(',', '', ($category['title'])));
      $url_cat = "/category-" . $car['id'] . "-" . $category['id'] . "-" . rus2translit($name_url) . "-" . $car['url'] . "/";
      // print_r($category);
    } else {
      $name_url = str_ireplace('.', '', str_ireplace(',', '', mb_strtolower($category['title'])));
      $url_cat = "/cat-" . $car['id'] . "-" . $category['id'] . "-" . rus2translit($name_url) . "-" . $car['url'] . "/";
      // print_r($category);
    }
    return $url_cat;
  }


  public function makeSubCategoryUrl($car, $category)
  // Producing urls for subcategory level
  {

    $url_sub = '';

    if ($car['old_view'] == 1) {
      $name_url2 = str_ireplace('.', '', str_ireplace(',', '', ($category['title'])));
      $url_sub = "/subcat-" . $car['id'] . "-" . $category['id'] . "-" . $category['parent'] . "-" . rus2translit($name_url2) . "-" . $car['url'] . "/";
    } else {
      $name_url2 = str_ireplace('.', '', str_ireplace(',', '', mb_strtolower($category['title'])));
      $url_sub = "/sub-" . $car['id'] . "-" . $category['id'] . "-" . $category['parent'] . "-" . rus2translit($name_url2) . "-" . $car['url'] . "/";
    }
    return $url_sub;
  }

  // Articles getiing for header

  public function getArticlesByCar()
  {
    $q = "SELECT a.id, a.model_rus, a.url, COUNT(b.id) as art_count
      FROM b_cars_new a
      LEFT JOIN articles_v2 b
      ON a.id = b.car
      GROUP BY a.id
      HAVING COUNT(b.id) > 0
      ";
    $m = $this->db();
    $t = $m->prepare($q);
    $t->execute();
    $data = $t->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }

  private function getCatalugues()
  {
    $q = "SELECT id_catalogue, model_rus FROM b_cars_new WHERE enabled_catalogue=1 ORDER BY sort";
    $m = $this->db();
    $t = $m->prepare($q);
    $t->execute();
    $data = $t->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }

  private function catalogueUrl($car)
  {
    $url = '';
    if ($car['id_catalogue'] == 1 or $car['id_catalogue'] == 2) {
      $url = "/porter1/" . $car['id_catalogue'] . "/";
    } else {
      $url = "/carcatalog/" . $car['id_catalogue'] . "/";
    }
    return $url;
  }

  public function catalogues()
  {
    $final_arr = [];
    foreach ($this->getCatalugues() as $car) {
      $final_arr[] = array('name' => $car['model_rus'], 'url' => $this->catalogueUrl($car));
    }
    return $final_arr;
  }

  public function setCarName($id)
  {
    $q = "SELECT id, model_rus FROM b_cars_new WHERE id = ?";
    $m = $this->db();
    $t = $m->prepare($q);
    $t->execute(array($id));
    $data = $t->fetch(PDO::FETCH_ASSOC);
    return $data;
  }
}
