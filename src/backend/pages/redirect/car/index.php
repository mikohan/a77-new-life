<?php
require_once __DIR__ . '/../../../lib/init.php';
include __DIR__ . '/../car/ang_cars.php';

$old_car_name = $_GET['old_car_name'];
$old_car_id = $_GET['old_car_id'];

$new_car_slug = array_filter($ang_cars, fn ($item) => $item['id'] == $old_car_id);
$car_slug = 'ljuboj-avtomobil';
if ($new_car_slug) {
  $car_slug = $new_car_slug[0]['new_slug'];
}

$conn = new Connection;

$car = $conn->getCar($car_slug);

$url = $u->car($car['make']['slug'], $car['slug']);

header("Location: {$url}", TRUE, 301);
