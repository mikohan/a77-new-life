<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once __DIR__ . '/../../lib/init.php';

require_once __DIR__ . '/../search/SearchModel.php';
$search_model = new SearchModel;

if (isset($_GET['search'])) {
  $search = trim(htmlspecialchars($_GET['search']));
}
$page_from = 0;
$page_size = 100;
$params = [];
if (isset($_GET['model'])) {
  $params["model"] = $_GET['model'];
}
if (isset($_GET['brand'])) {
  $params["brand"] = $_GET['brand'];
}
if (isset($_GET['has_photo'])) {
  $params["has_photo"] = $_GET['has_photo'];
}

$search_data = $search_model->getSearchFromAPI($search, $page_from, $page_size, $params);
$parts_array = $search_data['hits']['hits'];
$products_total = $search_data['hits']['total']['value'];
$products_count = count($parts_array);

$aggregations = $search_data['aggregations'];

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

// p($car_models);
include __DIR__ . '/../../../templates/search.html.php';
