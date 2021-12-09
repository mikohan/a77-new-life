<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


include __DIR__ . '/../../lib/init.php';
//require_once __DIR__ . '/../catalogue/CatalogueModel.php';
require_once __DIR__ . '/../catalogue/CatalogueModelRefactor.php';

$car_slug = $_GET['car'] ?? '';
$schema_id = $_GET['schema'] ?? ''; // Var current shcema id

// $catalogue_model = new CatalogueModel;
$catalogue_model_refactor = new CatalogueModelRefactor;

$car = $catalogue_model_refactor->getCar($car_slug);
$make = $car ? $car['make']['name'] : '';
$model = $car ? $car['name'] : '';


$parent = $schema_id;

$get_page_data = $catalogue_model_refactor->getPageData($car_slug, $schema_id);
$schema = $get_page_data['merged_data'];
$products = $get_page_data['product_data'];

// $schema = $catalogue_model->getSchemaWithProducts($car_slug, $parent);
$image = $schema['0']['img'];
$h3_table = $catalogue_model_refactor->getSchemaTitle($car_slug, $schema_id);



$products_chunks = $catalogue_model_refactor->splitArray($products, 3);
// p($products[0]);

$page_title = !empty($h3_table) ? $h3_table['name'] : '';




include __DIR__ . '/../../../templates/catalogue_schema.html.php';
