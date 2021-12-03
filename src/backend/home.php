<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
//require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/GetCategory.php';
//require_once __DIR__ . '/../../lib/PorterLastModel.php';

echo "some stuff";
require_once __DIR__ . '/../templates/home.html';
