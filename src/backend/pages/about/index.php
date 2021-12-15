<?php
require_once __DIR__ . '/../../lib/init.php';
require_once __DIR__ . '/../about/AboutModel.php';


$about_object = new AboutModel;

$staff = $about_object->getStaff();

include __DIR__ . '/../../../templates/about.html.php';
