<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../../lib/init.php';
require_once __DIR__ . '/../home/HomeModel.php';
require_once __DIR__ . '/../../includes/header/header.Model.php';

$home_model = new HomeModel;
// All cars we are getting from Header
require_once __DIR__ . '/../../../templates/home.html.php';
