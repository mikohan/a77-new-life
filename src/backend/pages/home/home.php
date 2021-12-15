<?php

require_once __DIR__ . '/../../lib/init.php';
require_once __DIR__ . '/../home/HomeModel.php';
require_once __DIR__ . '/../../includes/header/header.Model.php';

$home_model = new HomeModel;

$features = $home_model->getProductsForHomePage();
$posts = $home_model->getLatestPosts();


// Meta tags
$h1 = "Интернет магазин автозапчастей и автотоваров - " . COMPANY_INFO['company_name'] . ".";
$title = "Запчасти для автомобилей и спецтехники - " . COMPANY_INFO['company_name'] . ".";
$description = "Купить запчасти для легковых, грузовых автомобилей и спецтехники в интернет магазиние - " . COMPANY_INFO['company_name'] . ". | тел - " . COMPANY_INFO['phone_free'][1] . ". Более 20 000 Запчастей и автотоваров в наличии на складе сегодня!";
// All cars we are getting from Header
require_once __DIR__ . '/../../../templates/home.html.php';
