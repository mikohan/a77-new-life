<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


include __DIR__ . '/../../lib/init.php';
require_once __DIR__ . '/../catalogue/CatalogueModel.php';

$car_slug = $_GET['car'] ?? '';
$parent = $_GET['schema'] ?? '';

$catalogue_model = new CatalogueModel;
$car = $catalogue_model->getCar($car_slug);
$schema = $catalogue_model->getCatalogueSchema($car_slug, $parent);
$image = $schema['0']['img'];
$h3 = $catalogue_model->getSchemaTitle($car_slug, $parent);
// p($schema);



$make = $car ? $car['make']['name'] : '';
$model = $car ? $car['name'] : '';
$page_title = !empty($h3) ? $h3['name'] : '';




include __DIR__ . '/../../../templates/catalogue_schema.html.php';
