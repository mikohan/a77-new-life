<?php

/**
 * 1) Latest news 6 pieses
 * 2) Featured(Last arrivals better) prorudts total 10 pis
 * 3) Sales block and sales page also if not will be lazy
 * 4) Three column block at bottom 9 total
 * Plan
 * All that stuff probably get from one endpoint which is has not been created yet
 * after fetching we will cache in mysql table of course
 * Also needs to implement logic to get old photos glob like and cache it after
 */
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
