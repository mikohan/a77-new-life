<?php


include __DIR__ . '/../../lib/init.php';
require_once __DIR__ . '/../catalogue/CatalogueModel.php';

// error_reporting(E_ALL);
// ini_set("display_errors", 1);

$car_slug = $_GET['car'] ?? '';
$schema_id = $_GET['schema'] ?? ''; // Var current shcema id

// Refactored model goes here 
$catalogue_model_refactor = new CatalogueModel;
$car_title = $car_slug;
if ($car_slug == 'hd') {
  $car_title = 'hd78';
}
$car = $catalogue_model_refactor->getCar($car_title);
$make = $car ? $car['make']['name'] : '';
$model = $car ? $car['name'] : mb_ucfirst($car_slug);


$parent = $schema_id;

// Getting data weither from api or from mysql cahce table
$get_page_data = $catalogue_model_refactor->getPageData($car_slug, $schema_id);
// Spliting result by prod data and merged together data
$schema = $get_page_data['merged_data'];
$products = $get_page_data['product_data'];

$image = $schema['0']['img'];
$h3_table = $catalogue_model_refactor->getSchemaTitle($car_slug, $schema_id);

// Splitting products data for 3 chunks for bottom section of the page
$products_chunks = $catalogue_model_refactor->splitArray($products, 3);
// page title assigning
$page_title = !empty($h3_table) ? $h3_table['name'] : '';
$schema_name = mb_ucfirst($h3_table['name']) ?? '';

// h1 title and description formation
$h1 = "{$schema_name}";
$title = "{$schema_name} | Схема на {$make} {$model}.";
$description = "{$schema_name} | Схема {$make} {$model}. Удобный поиск артикула запчасти. 100% гарантии возврата.";

// $breadcrumb = "/catalogue/{$car_slug}/";
$bread_parent = ['name' => $h3_table['parent_name'], 'url' => "/catalogue/{$car_slug}/{$h3_table['id_h2']}/"];
$bread_model = "/catalogue/{$car_slug}/{$schema_id}/";


include __DIR__ . '/../../../templates/catalogue_schema.html.php';
