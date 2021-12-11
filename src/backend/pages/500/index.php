<?php
require_once(__DIR__ . '/../../lib/init.php');
include __DIR__ . '/../../../templates/404.html.php';

$error = [
  'statusCode' => 500,
  'error' => 'Ошибка сервера'
];
