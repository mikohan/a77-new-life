<?php


include __DIR__ . '/../../lib/init.php';
require_once __DIR__ . '/../catalogue/CatalogueModel.php';

$car_slug = $_GET['car'] ?? '';
$parent = $_GET['parent'] ?? '';

$catalogue_model = new CatalogueModel;
$car_title = $car_slug;
if ($car_slug == 'hd') {
  $car_title = 'hd78';
}
$car = $catalogue_model->getCar($car_title);
$first = $catalogue_model->getCatalogueSubcat($car_slug, $parent);



$make = $car ? mb_ucfirst($car['make']['name']) : '';
$model = $car ? mb_ucfirst($car['name']) : mb_ucfirst($car_slug);
$schema_name = mb_ucfirst($first[0]['parent_name']) ?? '';


$h1 = "Схема {$schema_name} {$make} {$model}";
$title = "Схема {$schema_name} {$make} {$model}. | Купить в магазине Ангара77.";
$description = "Схема {$schema_name} {$make} {$model}. Удобный поиск артикула запчасти. Пришлем фото и видео по запросу. 100% гарантии возврата. 20 лет на рынке.";

$breadcrumb = "/catalogue/{$car_slug}/";




include __DIR__ . '/../../../templates/catalogue.html.php';
