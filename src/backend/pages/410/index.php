<?php
require_once(__DIR__ . '/../../lib/init.php');

$error = [
  'status_code' => 410,
  'error' => 'Страница удалена'
];
include __DIR__ . '/../../../templates/410.html.php';
