<?php
require_once __DIR__ . '/../../../lib/init.php';
include __DIR__ . '/../data/redirect_data.php';

$car_id = $_GET['car_id'];
$cat_id = $_GET['cat_id'];

// Getting car 

$car_slug = 'ljuboj-avtomobil';
$new_car_slug = $ang_cars[$car_id] ?? false;
if ($new_car_slug) {
  $car_slug = $new_car_slug;
}
$conn = new Connection;
// Getting car object
$car = $conn->getCar($car_slug);

// Here logic to get category slug
// p($old_cats);

$category_slug = 'zapchasti';
$new_cat_slug = $big_cats[$cat_id] ?? false;
if ($new_cat_slug) {
  $category_slug = $new_cat_slug;
}

$url = $u->categoryCar($car['slug'], $category_slug);

header("Location: {$url}", TRUE, 301);
