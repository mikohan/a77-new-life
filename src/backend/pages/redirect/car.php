<?php
require_once __DIR__ . '/../../lib/init.php';
include __DIR__ . '/../redirect/ang_cars.php';

$old_car_name = $_GET['old_car_name'];
$old_car_id = $_GET['old_car_id'];

$new_car_slug = $ang_cars[$old_car_id]['new_slug'] ?? false;
$conn = new Connection;
if ($new_car_slug) {

  $car = $conn->getCar($new_car_slug);
} else {

  $car = $conn->getCar('ljuboj-avtomobil');
}

$url = $u->car($car['make']['slug'], $car['slug']);

header("Location: {$url}", TRUE, 301);
