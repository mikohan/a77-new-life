<?php
require_once __DIR__ . '/../../../lib/init.php';
include __DIR__ . '/../data/redirect_data.php';

$cat_number = $_GET['cat_number'];


function getDataFromAPI($cat_number)

{
  /**
   * Get data from API
   */

  $server_url = PHOTO_API_URL;
  $url = "{$server_url}/api/product/get-redirect-product-by-cat-number/{$cat_number}/";
  //  Initiate curl
  $ch = curl_init($url);
  $options = array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => array('Content-type: application/json')
  );
  curl_setopt_array($ch, $options);
  $result = curl_exec($ch);
  $info = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  if ($info == 200) {
    $mydata = $result;
  } else {
    throw new Error("API not reacheble check it out!");
  }
  curl_close($ch);
  return $mydata;
}
// Getting product
try {
  $product = json_decode(getDataFromAPI($cat_number), true);
  $url = $u->product($product['slug']);
  header("Location: {$url}", TRUE, 301);
} catch (Throwable $t) {
  http_response_code(404);
  header("Location: /404/");
  exit();
}
