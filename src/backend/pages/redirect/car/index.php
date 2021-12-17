<?php
require_once __DIR__ . '/../../../lib/init.php';
include __DIR__ . '/../data/redirect_data.php';

$old_car_name = $_GET['old_car_name'];
$old_car_id = $_GET['old_car_id'];

$car_slug = 'ljuboj-avtomobil';
$new_car_slug = $ang_cars[$old_car_id] ?? false;
if ($new_car_slug) {
  $car_slug = $new_car_slug;
}

$conn = new Connection;

$car = $conn->getCar($car_slug);

$url = $u->car($car['make']['slug'], $car['slug']);

header("Location: {$url}", TRUE, 301);
