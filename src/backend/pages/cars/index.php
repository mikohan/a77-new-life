<?php

require_once __DIR__ . '/../../lib/init.php';
require_once __DIR__ . '/../cars/CarsModel.php';
require_once __DIR__ . '/../../lib/QuickView.php';


// error_reporting(E_ALL);
// ini_set("display_errors", 1);

$cars_model = new CarsModel;
$cars_car = $cars_model->getCar($_GET['model']);
// p($cars_car['categories']);
$car_all_categories = buildTree($cars_car['categories']);
// p($car_all_categories);
//comment

// Meta stuff here
$h1 = "Запчасти для " . mb_ucfirst($cars_car['make']['name']) . " " . mb_ucfirst($cars_car['name']);
$title = "Запчасти на " . mb_ucfirst($cars_car['make']['name']) . " " . mb_ucfirst($cars_car['name']) . " в интернет магазиние - " . COMPANY_INFO['company_name'];
$description = "Купить запчасти для " . mb_ucfirst($cars_car['make']['name']) . " " . mb_ucfirst($cars_car['name']) . " в интернет магазиние - " . COMPANY_INFO['company_name'] . ". | тел - " . COMPANY_INFO['phone_free'][1] . ". " . $cars_car['doc_count'] . " Запчастей для " . mb_ucfirst($cars_car['make']['name']) . " " . mb_ucfirst($cars_car['name']) . " в наличии на складе сегодня!";

$make_slug = $cars_car['make']['slug'];
$model_slug = $cars_car['slug'];
$car_path = $cars_car['make']['slug'] . '/' . $cars_car['slug'];





$features = $cars_model->getProductsForHomePage($cars_car);
$posts = $cars_model->getLatestPosts();
// All cars we are getting from Header
require_once __DIR__ . '/../../../templates/cars.html.php';

// Making tree
function buildTree(array $array, $idKeyName = 'id', $parentIdKey = 'parent', $childNodesField = 'children')
{
  $indexed = array();
  // first pass - get the array indexed by the primary id
  foreach ($array as $row) {
    $indexed[$row[$idKeyName]]                   = $row;
    $indexed[$row[$idKeyName]][$childNodesField] = array();
  }
  // second pass
  $root = array();
  foreach ($indexed as $id => $row) {
    $indexed[$row[$parentIdKey]][$childNodesField][$id] = &$indexed[$id];
    if (!$row[$parentIdKey]) {
      $root[$id] = &$indexed[$id];
    }
  }
  return $root;
}
