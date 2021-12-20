<?php
// ob_start();
ini_set('max_execution_time', 300);
error_reporting(E_ALL);
ini_set("display_errors", 1);
include __DIR__ . '/../../lib/init.php';
include __DIR__ . '/../yandex.xml/YandexXmlModel.php';

$sm = new YandexXmlModel;

header('Content-type: application/xml');
header("Content-Type: text/xml; charset=utf-8");


$name = "Ангара";

# Описание магазина

$desc = "Запчасти для грузовиков и автобусов";
$site = COMPANY_INFO['site'];
$cost = COMPANY_INFO['delivery_rate'];
$curr = "RUR";
$date_obj = new DateTime();
$date =  $date_obj->format('Y-m-d');

# Валюта

// Getting categoreis from API
$categories = $sm->categoriesPages();


$category_string = '<categories>';
foreach ($categories as $category) {
  $parent_ck = $category['parent'] ?? false;
  $parent = $parent_ck ? 'parentId="' . $category['parent'] . '"' : '';
  $id = $category['id'];
  $category_string .= '<category id="' . $id . '" ' . $parent . '>' . $category['name'] .  '</category>';
}
$category_string .= '</categories>';

$products = $sm->getProducts();

$offers = '';
$i = 0;
foreach ($products['hits']['hits'] as $product_source) {
  $product = $product_source['_source'];
  $id = $product['one_c_id'] ?? false;
  // if (!$id) {
  //   continue;
  // }
  // $id = $product_source['_id'];
  $model_ck = $product['model'] ?? false;
  $model = $model_ck ? $product['model'][0]['name'] : '';
  $make = $model_ck ? $product['model'][0]['make']['name'] : '';

  $name2 = $product['name2'] ?? '';
  $name = $product['name'] . ' ' . $make . ' ' . $model . ' ' . $name2;

  $brand = $product['brand']['name'] ?? '';
  $url = $u->product($product['slug']);

  $pictures = '';
  foreach ($product['images'] as $img) {
    $pictures .= "<picture>{$img['image']}</picture>";
  }

  $categoru_ck = $product['category'] ?? false;
  $category_id = $categoru_ck ? $product['category'][0]['id'] : null;

  $offers .= <<<HTML
    <offer id="{$id}">
      <url>{$url}}/?utm_source=market.yandex.ru</url>
      <price>{$product['price']}</price>
      <currencyId>{$curr}</currencyId>
      <categoryId>{$category_id}</categoryId>
      {$pictures}
      <vendor>{$brand}</vendor>
      <model>{$make} {$model}</model>
      <vendorCode>{$product['cat_number']}</vendorCode>
      <name>{$name}</name>
      <description>{$name} от производителя {$brand} для автомобиля {$make} {$model} . На все запчасти есть сертификат соответсвия.</description>
      <delivery>true</delivery>
      <pickup>true</pickup>
      <delivery-options>
      <option cost="{$cost}" days="1" order-before="18" />
      </delivery-options>
      <pickup-options>
      <option cost="0" days="1" />                        
      </pickup-options>
      <store>true</store>   
    </offer>
HTML;
  if ($i == 10) {
    break;
  }
  $i++;
}

$out = <<<HTML
<?xml version="1.0" encoding="utf-8"?>
<yml_catalog date="{$date}">
<shop>
<name>{$name}</name>
<company>{$desc}</company>
<url>{$site}</url>
<currencies>
    <currency id="RUR" rate="1"/>
</currencies>
<categories>
  {$category_string}
</categories>
<offers>
{$offers}
</offers>
</shop>
</yml_catalog>
HTML;

echo $out;
