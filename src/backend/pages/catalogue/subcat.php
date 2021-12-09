<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


include __DIR__ . '/../../lib/init.php';
require_once __DIR__ . '/../catalogue/CatalogueModel.php';

$car_slug = $_GET['car'] ?? '';
$parent = $_GET['parent'] ?? '';

$catalogue_model = new CatalogueModel;
$car = $catalogue_model->getCar($car_slug);
$first = $catalogue_model->getCatalogueSubcat($car_slug, $parent);



$make = $car ? $car['make']['name'] : '';
$model = $car ? $car['name'] : '';




include __DIR__ . '/../../../templates/catalogue.html.php';