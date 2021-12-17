<?php
require_once(__DIR__ . '/../../lib/init.php');

$error = [
  'status_code' => 404,
  'error' => 'Страница не найдена'
];
include __DIR__ . '/../../../templates/404.html.php';
