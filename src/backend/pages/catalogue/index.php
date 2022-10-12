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

$h1 = 'Схема ' . $make . ' ' . $model;
$title = 'Схема на ' . $make . ' ' . $model . ' | ' . 'Купить в магазине Ангара77.';
$description = 'Схема на ' . $make . ' ' . $model . '. Удобный поиск артикула запчасти. Пришлем фото и видео по запросу. 100% гарантии возврата. 20 лет на рынке.';


$breadcrumb = "/catalogue/{$car_slug}/";
$parent = false;



include __DIR__ . '/../../../templates/catalogue.html.php';
