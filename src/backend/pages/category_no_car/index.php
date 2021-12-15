<?php
require_once(__DIR__ . '/../../lib/init.php');
require_once(__DIR__ . '/../category/CategoryModel.php');
$categoryModel = new CategoryModel;

$get_category = $_GET['category'];
$page_from = $_GET['page_from'] ?? 0;
$page_size = 50;
$current_page = $_GET['page'] ?? 1;


$query = urldecode($_SERVER['QUERY_STRING']);

$checked_car_model = [];
$checked_brand = [];
$checked_has_photo = [];
$checked_engine = [];
$active_filters = [];
$possible_filters = ['car_models', 'brand', 'has_photo', 'engine'];
foreach (explode('&', $query) as $pair) {

  [$key, $value] = explode('=', $pair);
  if ($key == 'category') {
    continue;
  }
  if ($key == 'car_models') {
    $checked_car_model[] = $value;
    $active_filters[] = array('Машина', $value, $key);
  }
  if ($key == 'brand') {
    $checked_brand[] = $value;
    $active_filters[] = array('Бренд', $value, $key);
  }
  if ($key == 'has_photo') {
    $checked_has_photo[] = $value;
    $active_filters[] = array('Фото', $value ? 'Есть' : 'Нет', $key);
  }
  if ($key == 'engine') {
    $checked_engine[] = $value;
    $active_filters[] = array('Двигатель', $value, $key);
  }
}

parse_str($_SERVER['QUERY_STRING'], $get_arr);
//$current_car = $categoryModel->getCar($get_model);

// $active_filters = array_merge($checked_car_model, $checked_engine, $checked_brand, $checked_has_photo);
// Pagination work goes here
/**
 * Getting data from server 
 */
$site_url = PHOTO_API_URL;
$url = "{$site_url}/api/product/jsontest?page_from={$current_page}&page_size={$page_size}&category={$get_category}";
// Root url for page
$page_root_url = "/category/{$get_category}";
$unique_query_array = array_unique($get_arr);

$query_params = '';
if (count($get_arr)) {
  foreach ($get_arr as $key => $value) {
    if ($key == 'category' || $key == 'page') {
      continue;
    }
    if (!in_array($key, $possible_filters)) {
      continue;
    }
    $query_params .= "&{$key}={$value}";
  }
  $url = $url . $query_params;
}


// // Trying get data from api if not raise 404
$remote_data = $categoryModel->getDataFromAPILocal($url);
//p($remote_data);
// If doc count equal to zerro raise 404
if (!$remote_data['hits'] ?? false || !$remote_data['hits']['total']['value']) {
  http_response_code(404);
  header("Location: /404/");
  exit();
}

// Products
$products = $remote_data['hits']['hits'];
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
$title_phone = TELEPHONE_FREE;
$title = "{$title_category} ✰ в интернет магазине Запчастей в Москве ☎ {$title_phone}";
$description = "{$title_category} ✰ Всегда 97% запчастей в наличии на складе. ☎ {$title_phone}";


// pagination

$total_pages = ceil($products_total_count / $page_size);
$pagination_query = $_GET;
$new_pagination_query = array_filter($pagination_query, fn ($item) => $item !== 'category', ARRAY_FILTER_USE_KEY);

$new_pagination_query['page'] = $current_page - 1;

$previous_page_url = '/category/' . $get_category . '/?' . http_build_query($new_pagination_query);

$new_pagination_query['page'] = $current_page + 1;
$next_page_url = '/category/' . $get_category . '/?' . http_build_query($new_pagination_query);


require_once(__DIR__ . '/../../../templates/category_no_car.html.php');
// // require_once('./category.html.php');
