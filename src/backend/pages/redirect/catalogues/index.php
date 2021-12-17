<?php
require_once __DIR__ . '/../../../lib/init.php';
$cats = CATALOGUES;


$url = '';
if (isset($_GET['id'])) {
  // Porter1 and Porter2 stuff
  foreach ($cats as $cat) {
    if ($cat['old_id'] == $_GET['id']) {
      $car_slug = $cat['slug'];
      $url = $u->catalogue($car_slug);
    }
  }
} elseif (isset($_GET['car_id'])) {
  // Other car stuff
  foreach ($cats as $cat) {
    if ($cat['old_id'] == $_GET['car_id']) {
      $car_slug = $cat['slug'];
      $url = $u->catalogue($car_slug);
    }
  }
} else {
  // do redirect to 404
  http_response_code(404);
  header("Location: /404/");
  exit();
}

header("Location: {$url}");
