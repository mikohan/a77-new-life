<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


include __DIR__ . '/../../lib/init.php';
require_once __DIR__ . '/../product/ProductModel.php';

$product_model = new ProductModel;



// Here is check if ajax data has a photo then include new page
// Else include old page!
// End of story


$slug = $_GET['slug'];
// $id = 13;
// $url = PHOTO_API_URL . "/api/product/onec/" . $id . "/";
$api_data = $product_model->getDataFromAPI($slug);
p($api_data);


// //$product = new Product();
// //$old_data = $product->getProduct($id);
// //$all_cars = $product->GetCars(0);
// $car = mb_strtolower($data['car_model'][0]['name'], 'UTF-8');
// $catalogue_new = $product->getCatalogue($data['cat_number'], $car);

// $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// // Analogs part here
// $url_analog = PHOTO_API_URL . '/api/product/analogs/' . $data['id'] . '/?cat_number=' . $data['cat_number'];
// $analogs = $product_model->getDataFromAPIAnalog($url_analog);

// //Related here

// $url_params = array(
//   'car_model' => $data['car_model'][0]['id'],
//   'product_name' => $data['name']
// );




// $url_related = PHOTO_API_URL . '/api/product/relatedsite/' . $data['id'] . '/?' . http_build_query($url_params, '', '&amp;');
// $related_new = $product_model->getDataFromAPIAnalog($url_related);
// // p($related_new);

// // $product->p($catalogue);

include __DIR__ . '/../../../templates/product.html.php';
