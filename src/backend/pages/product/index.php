<?php
include __DIR__ . '/../../lib/init.php';
require_once __DIR__ . '/../product/ProductModel.php';

$product_model = new ProductModel;



// Here is check if ajax data has a photo then include new page
// Else include old page!
// End of story


$slug = $_GET['slug'];
// $id = 13;
// $url = PHOTO_API_URL . "/api/product/onec/" . $id . "/";
try {

  $product = $product_model->getProduct($slug);
} catch (Throwable $t) {
}
// p($product);
$model = count($product['model']) ? mb_strtolower($product['model'][0]['name'], 'UTF-8') : '';
$make = count($product['model']) ? mb_strtolower($product['model'][0]['make']) : '';


$check_model = true;
if ($model == "все модели") {
  $check_model = false;
}

$analogs = count($product['analogs']) ? $product['analogs'] : [];

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$attributes = count($product['product_attribute']) ? $product['product_attribute'] : [];
unset($attributes['product']);
$attrs = [];
foreach ($attributes as $attr) {
  $attrs[] = ['name' => $attr['attribute_name']['name'], 'value' => $attr['attribute_value']];
}
// Main brand making
$part_brand = 'ORIGINAL';
if ($product['brand'] ?? false) {
  $part_brand = $product['brand']['brand'];
}
// Attribute rebuilding


$product_tmb = count($product['product_image']) ? $product['product_image'][0]['img150'] : "/assets/images/product/product-default-160.jpg";

$product_cross = count($product['product_cross']) ? $product['product_cross'] : [];

$related = count($product['related']) ? $product['related'] : [];

$slug = count($product['model']) ? $product['model'][0]['make_slug'] : null;

$name2 = ' ' .  $product['name2'] ?? ' ';

$name = mb_ucfirst($product['name']) . $name2 .  mb_ucfirst($make) . ' ' . mb_ucfirst($model);



$all_cars = [];
if ($slug) {
  $all_cars = $product_model->GetCars($slug);
}

// Making array of product images if product have not have images than make array from default image

$product_images = [];
$product_tmbs = [];
if (!count($product['product_image'])) {
  foreach (range(0, 5) as $i) {
    $product_images[] = "/assets/images/products/product-default-800.jpg";
    $product_tmbs[] = "/assets/images/products/product-default-160.jpg";
  }
} else {
  foreach ($product['product_image'] as $item) {
    $product_images[] = $item['image'];
    $product_tmbs[] = $item['img150'];
  }
}
// Comment


$catalogue_new = null;
if (count($product['model'])) {
  $catalogue_new = $product_model->getCatalogue($product['cat_number'], $product['model'][0]['slug']);
}
$today = new DateTime();
$today->add(new DateInterval('P30D'));
$valid = $today->format('Y-m-d');
$product_link = $u->product($product['slug']);
// Categories for breadcrumbs
$product['name'] = str_replace('"', '', $product['name']);
$product['name2'] = str_replace('"', '', $product['name']);

include __DIR__ . '/../../../templates/product.html.php';
