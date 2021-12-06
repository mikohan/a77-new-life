<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once(__DIR__ . '/../../lib/init.php');


$lastname = isset($_GET['lastname']) ? $_GET['lastname'] : '';
$firstname = isset($_GET['firstname']) ? $_GET['firstname'] : '';
$payment_method = isset($_GET['paymentMethod']) ? $_GET['paymentMethod'] : '';
$payment_method = $payment_method == 'offline' ? 'При получении' : 'Оплата онлайн';


// Needed to implement saver orders to db logic
$call_back_url = ANG_MAP . '/backend/pages/order/thank.php?paymentMethod=online';
include(__DIR__ . '/../../../templates/order-success.html.php');
