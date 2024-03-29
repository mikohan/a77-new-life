<?php
// ob_start();
ini_set('max_execution_time', 600);
ini_set("memory_limit", "512M");
include __DIR__ . '/../../lib/init.php';
include __DIR__ . '/../yandex.xml/YandexXmlModel.php';

$sm = new YandexXmlModel;

header('Content-type: application/xml');
header("Content-Type: text/xml; charset=utf-8");


$nal = isset($_GET['nal']) ?? 0;
$price_min = intval($_GET['price_min']);
$price_max = intval($_GET['price_max']);


$name = "Ангара";

# Описание магазина
$shop_name = COMPANY_INFO['company_name'];
$desc = "Запчасти для грузовиков и автобусов";
$site = COMPANY_INFO['site'];
$cost = COMPANY_INFO['delivery_rate'];
$curr = "RUR";
$date_obj = new DateTime();
$date = $date_obj->format('Y-m-d');

# Валюта

// Getting categoreis from API
$cats = $sm->categoriesPages();


$categories = '';
foreach ($cats as $category) {
  $parent_ck = $category['parent'] ?? false;
  $parent = $parent_ck ? 'parentId="' . $category['parent'] . '"' : '';
  $id = $category['id'];
  $categories .= '<category id="' . $id . '" ' . $parent . '>' . $category['name'] . '</category>';
}

$products = $sm->getProducts();

/*Name - Фильтр масляный на Портер 1, SPEEDMATE, 2630042040
Vendor - производителль = SPEEDMATE
Model - Марка + модель = Хендай портер
VendorCode - кат номер = 2630042040
Description - Большой склад в Москве. Пришлем видео и фото по запросу. Подбор запчастей по VIN. Самовывоз за 1 час. 20 лет на рынке. 100% гарантия возврата.
Фильтры:
от 20
10-20
5-10
1-5
В фиде исключить колеса и шины / масла и жидкости / инструменты / крепеж
*/
$offers = '';
$i = 0;
foreach ($products['hits']['hits'] as $product_source) {
  $product = $product_source['_source'];
  $in_stock = intval($product['stocks'][0]['quantity']);
  if ($in_stock == 0) {
    continue;
  }

  $id = $product['one_c_id'] ?? false;
  if (!$id) {
    continue;
  }
  $price = $product['price'] ?? false;
  if (!$price) {
    continue;
  }

  // Price filters here 

  $model_ck = $product['model'] ?? false;
  $model = $model_ck ? $product['model'][0]['name'] : '';
  $make = $model_ck ? $product['model'][0]['make']['name'] : '';


  $brand = $product['brand']['name'] ?? '';
  $brand = preg_replace("/[^\w\d\s]+/", " ", $brand);
  $brand = mb_ucfirst($brand);
  $url = rtrim(SERVER_ROOT_URL, '/') . $u->product($product['slug']);
  $cat_number = $product['cat_number'];

  //Фильтр масляный на Портер 1, SPEEDMATE, 2630042040
  $name2 = mb_ucfirst($product['name2']) ?? '';

  $name = mb_ucfirst($product['name']) . ' на ' . mb_ucfirst($model) . ', ' . $brand . ', ' . $cat_number . ' ' . $name2;
  if(preg_match("/масло\b/iu",$name)){
    continue;
  }
  if(preg_match("/жидкость\b/iu",$name)){
    continue;
  }
  if(preg_match("/болт\b/iu",$name)){
    continue;
  }
  if(preg_match("/гайка\b/iu",$name)){
    continue;
  }

  $pictures = '';
  $j = 0;
  foreach ($product['images'] as $img) {
    $im = addslashes($img['image']);
    $pictures .= "<picture>{$img['image']}</picture>";
    if ($j == 9) {
      break;
    }
    $j++;
  }

  $category_ck = $product['category'] ?? false;
  if (!$category_ck) {
    continue;
  }
  $category_id = $category_ck ? end($product['category'])['id'] : null;

  $model = mb_ucfirst($model);
  $make = mb_ucfirst($make);

  // Filtering by price
  if (($price_min <= $price) && ($price <= $price_max)) {
    $offers .= <<<HTML
    <offer id="{$id}">
      <url>{$url}</url>
      <price>{$product['price']}</price>
      <currencyId>{$curr}</currencyId>
      <categoryId>{$category_id}</categoryId>
      {$pictures}
      <model>{$make} {$model}</model>
      <vendorCode>{$cat_number}</vendorCode>
      <vendor>{$brand}</vendor>
      <description>Большой склад в Москве. Пришлем видео и фото по запросу. Подбор запчастей по VIN. Самовывоз за 1 час. 20 лет на рынке. 100% гарантия возврата.</description>
      <name>{$name}</name>
      <delivery>true</delivery>
      <pickup>true</pickup>
      <delivery-options>
      <option cost="{$cost}" days="1-3" order-before="18" />
      </delivery-options>
      <pickup-options>
      <option cost="0" days="1" />                        
      </pickup-options>
      <store>true</store>   
    </offer>
HTML;
  }

  // if ($i == 10) {
  //   break;
  // }
  // $i++;
}

$out = <<<HTML
<?xml version="1.0" encoding="utf-8"?>
<yml_catalog date="{$date}">
  <shop>
    <name>{$shop_name}</name>
    <company>{$desc}</company>
    <url>{$site}</url>
    <currencies>
      <currency id="RUR" rate="1" />
    </currencies>
    <categories>
      {$categories}
    </categories>
    <offers>
      {$offers}
    </offers>
  </shop>
</yml_catalog>
HTML;


echo $out;