<?php


include __DIR__ . '/../../lib/init.php';
require_once __DIR__ . '/../catalogue/CatalogueModel.php';

$car_slug = $_GET['car'] ?? '';

$catalogue_model = new CatalogueModel;

$car_title = $car_slug;
if ($car_slug == 'hd') {
  $car_title = 'hd78';
}
$car = $catalogue_model->getCar($car_title);
$first = $catalogue_model->getCatalogue($car_slug);




$make = $car ? $car['make']['name'] : '';
$model = $car ? $car['name'] : mb_ucfirst($car_slug);




include __DIR__ . '/../../../templates/catalogue.html.php';
