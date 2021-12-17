<?php
require_once __DIR__ . '/../../../lib/init.php';
include __DIR__ . '/../redirect/car/ang_cars.php';

$car_id = $_GET['car_id'];
$cat_id = $_GET['cat_id'];

$new_car_slug = $ang_cars[$car_id]['new_slug'] ?? false;
$conn = new Connection;
// Getting car object
if ($new_car_slug) {
  $car = $conn->getCar($new_car_slug);
} else {
  $car = $conn->getCar('ljuboj-avtomobil');
}

// Here logic to get category slug

$url = $u->categoryCar($car['slug'], $category_slug);

// header("Location: {$url}", TRUE, 301);
