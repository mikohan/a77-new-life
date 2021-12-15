<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once __DIR__ . '/../../lib/init.php';
require_once __DIR__ . '/../cars/CarsModel.php';

$cars_model = new CarsModel;
$cars_car = $cars_model->getCar($_GET['model']);

// Meta stuff here
$h1 = "Запчасти для " . mb_ucfirst($cars_car['make']['name']) . " " . mb_ucfirst($cars_car['name']);
$title = "Запчасти на " . mb_ucfirst($cars_car['make']['name']) . " " . mb_ucfirst($cars_car['name']) . " в интернет магазиние - " . COMPANY_INFO['company_name'];
$description = "Купить запчасти для " . mb_ucfirst($cars_car['make']['name']) . " " . mb_ucfirst($cars_car['name']) . " в интернет магазиние - " . COMPANY_INFO['company_name'] . ". | тел - " . COMPANY_INFO['phone_free'][1] . ". " . $cars_car['doc_count'] . " Запчастей для " . mb_ucfirst($cars_car['make']['name']) . " " . mb_ucfirst($cars_car['name']) . " в наличии на складе сегодня!";
// p($cars_car);



$features = $cars_model->getProductsForHomePage($cars_car);
$posts = $cars_model->getLatestPosts();
// All cars we are getting from Header
require_once __DIR__ . '/../../../templates/cars.html.php';
