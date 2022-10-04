<?php
require_once(__DIR__ . '/../../lib/init.php');
require_once(__DIR__ . '/../category/CategoryModel.php');


$categoryModel = new CategoryModel;

$get_model = $_GET['model'];
$get_category = $_GET['category'];

$current_car = $categoryModel->getCar($get_model);



/**
 * Getting data from server 
 */
$site_url = PHOTO_API_URL;
$how_many_products = PRODUCTS_HOW_MANY_GET;
$url = "{$site_url}/api/product/jsontest?model={$get_model}&page_size={$how_many_products}&category={$get_category}";

// Trying get data from api if not raise 404
$remote_data = $categoryModel->getDataFromAPILocal($url);
// If doc count equal to zerro raise 404
if (!$remote_data['hits'] ?? false || !$remote_data['hits']['total']['value']) {
  http_response_code(404);
  header("Location: /404/");
  exit();
}

// Products
$products = $remote_data['hits']['hits'];

// $test_prod = $products[0]['_source'];
// $old_photo_object = new OldPhotos($test_prod);
// $old_photo_object->makePhotos();

$products_total_count = $remote_data['hits']['total']['value'];
// Aggregations 
$aggregations = $remote_data['aggregations'];
// Aggregations separeted
$car_models = $aggregations['car_models'];
$condition = $aggregations['condition'];
$brands = $aggregations['brands'];
$bages = $aggregations['bages'];
$engines = $aggregations['engines'];
$categories = $aggregations['categories']['buckets'];
$has_photo = $aggregations['has_photo'];
//Prices aggregations
$max_price = $aggregations['max_price']['value'];
$min_price = $aggregations['min_price']['value'];

function findCurrent($val, $array)
{
  foreach ($array as $item) {
    if ($item['slug'] == $val) {
      return $item;
    }
  }
  return false;
}

function findChildren($currentCategory, $categories)
{
  foreach ($categories as $cat) {
    if ($currentCategory['id'] === $cat['parent']) {
      yield $cat;
    }
  }
}
$page_category = findCurrent($get_category, $categories);
function par($currentCategory, $categories, $parents = [])
{
  foreach ($categories as $category) {
    if ($currentCategory['parent'] == $category['id']) {
      $parents[] = $category;
      return par($category, $categories, $parents);
    }
  }
  return $parents;
}
$parents = par($page_category, $categories);
usort($parents, function ($item1, $item2) {
  return $item1['id'] <=> $item2['id'];
});

if (!$page_category['parent']) {
  $neighbors = [];
  foreach ($categories as $cat) {
    if (!$cat['parent']) {
      if ($cat['id'] !== $page_category['id'])
        $neighbors[] = $cat;
    }
  }
}

// Need to implement somewhere
// p($neighbors);
///home/manhee/sites/angara77.loc/category/category_4.html.php
//Making page title and description
$title_category = $page_category ? mb_ucfirst($page_category['name']) : "Запчасти";
$title_make = $current_car->make->name ? $current_car->make->name : "для Всех";
$title_model = $current_car->name ? $current_car->name : "Автомобилей";
$title_phone = TELEPHONE_FREE;
$title = "{$title_category} для {$title_make} {$title_model} ✰ в интернет магазине Запчастей в Москве ☎ {$title_phone}";
$description = "{$title_category} для {$title_make} {$title_model} ✰ Всегда 97% запчастей в наличии на складе. ☎ {$title_phone}";
require_once(__DIR__ . '/../../../templates/category.html.php');
// require_once('./category.html.php');
