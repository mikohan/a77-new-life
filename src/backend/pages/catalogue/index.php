<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


include __DIR__ . '/../../lib/init.php';
require_once __DIR__ . '/../product/ProductModel.php';

// $product_model = new ProductModel;


include __DIR__ . '/../../../templates/catalogue.html.php';
