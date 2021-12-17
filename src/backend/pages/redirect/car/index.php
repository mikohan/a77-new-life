<?php
require_once __DIR__ . '/../../../lib/init.php';
include __DIR__ . '/../car/ang_cars.php';

$old_car_name = $_GET['old_car_name'];
$old_car_id = $_GET['old_car_id'];

$car_slug = 'ljuboj-avtomobil';
foreach ($ang_cars as $ang_car) {
  if ($ang_car['id'] == $old_car_id) {
    $car_slug = $ang_car['new_slug'];
  }
}
p($car_slug);

$conn = new Connection;

$car = $conn->getCar($car_slug);

$url = $u->car($car['make']['slug'], $car['slug']);

// header("Location: {$url}", TRUE, 301);
