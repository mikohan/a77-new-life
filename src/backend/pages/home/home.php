<?php

require_once __DIR__ . '/../../lib/init.php';
require_once __DIR__ . '/../../lib/QuickView.php';
require_once __DIR__ . '/../home/HomeModel.php';
require_once __DIR__ . '/../../includes/header/header.Model.php';
require_once(__DIR__ . '/../blog/BlogModelBackend.php');

$home_model = new HomeModel;

$features = $home_model->getProductsForHomePage();
// $posts = $home_model->getLatestPosts();


// Meta tags
// $h1 = "Интернет магазин автозапчастей и автотоваров - " . COMPANY_INFO['company_name'] . ".";
// $title = "Запчасти для автомобилей и спецтехники - " . COMPANY_INFO['company_name'] . ".";
// $description = "Купить запчасти для легковых, грузовых автомобилей и спецтехники в интернет магазиние - " . COMPANY_INFO['company_name'] . ". | тел - " . COMPANY_INFO['phone_free'][1] . ". Более 20 000 Запчастей и автотоваров в наличии на складе сегодня!";

// Gettting latest posts

// Import get latest posts from blog ModelBackend
//$latest_post_get_url = BLOG_API_URL . '/wp/v2/posts?_embed&per_page=5';
$latest_post_get_url = 'https://angara77.com/blog-api/wp-json/wp/v2/posts?_embed&per_page=5';
$obj_lstest_post = new BlogModelHTTP($latest_post_get_url);

$posts =  $obj_lstest_post->getAllArticlesBackend();
// p($posts);


$h1 = 'Запчасти для коммерческого и грузового транспорта';
$title = 'Запчасти для коммерческого и грузового транспорта | Магазин Ангара 77';
$description = 'Каталог запчастей для коммерческих и грузовых автомобилей. Наглядные схемы. 20 лет на рынке. Доставка по России. 100% гарантия возврата';

// All cars we are getting from Header
require_once __DIR__ . '/../../../templates/home.html.php';
