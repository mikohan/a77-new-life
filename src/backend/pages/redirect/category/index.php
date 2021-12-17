<?php
require_once __DIR__ . '/../../../lib/init.php';
include __DIR__ . '/../car/ang_cars.php';
include __DIR__ . '/../category/redirect_data.php';

$car_id = $_GET['car_id'];
$cat_id = $_GET['cat_id'];
p($car_id);
p($cat_id);

// Getting car 

$car_slug = 'ljuboj-avtomobil';
foreach ($ang_cars as $ang_car) {
  if ($ang_car['id'] == $car_id) {
    $car_slug = $ang_car['new_slug'];
  }
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

// header("Location: {$url}", TRUE, 301);
