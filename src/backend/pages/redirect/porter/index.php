<?php
require_once __DIR__ . '/../../../lib/init.php';
include __DIR__ . '/../data/redirect_data.php';

$one_c_id = $_GET['one_c_id'];



function getDataFromAPI($one_c_id)

{
  /**
   * Get data from API
   */

  $server_url = PHOTO_API_URL;
  $url = "{$server_url}/api/product/get-redirect-product-by-one-c-id/{$one_c_id}/";
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
  $product = json_decode(getDataFromAPI($one_c_id), true);
  $url = $u->product($product['slug']);
  header("Location: {$url}", TRUE, 301);
} catch (Throwable $t) {
  http_response_code(404);
  header("Location: /404/");
  exit();
}
