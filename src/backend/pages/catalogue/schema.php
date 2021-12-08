<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


include __DIR__ . '/../../lib/init.php';
require_once __DIR__ . '/../catalogue/CatalogueModel.php';

$car_slug = $_GET['car'] ?? '';
$parent = $_GET['schema'] ?? ''; // Var current shcema id

$catalogue_model = new CatalogueModel;
$car = $catalogue_model->getCar($car_slug);
$schema = $catalogue_model->getCatalogueSchema($car_slug, $parent);
$image = $schema['0']['img'];
$h3_table = $catalogue_model->getSchemaTitle($car_slug, $parent);

// make array of numbers

$numbers = [];
foreach ($schema as $s) {
  $numbers[] = $s['h5_cat_number'];
}


// product getting here
$products = $catalogue_model->getProductsByCatNumbers($parent, $car_slug, $numbers);
// p($products);

$products_chunks = $catalogue_model->splitArray($products, 3);
// p($products[0]);

$make = $car ? $car['make']['name'] : '';
$model = $car ? $car['name'] : '';
$page_title = !empty($h3_table) ? $h3_table['name'] : '';




include __DIR__ . '/../../../templates/catalogue_schema.html.php';
