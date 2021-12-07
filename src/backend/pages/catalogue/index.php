<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


include __DIR__ . '/../../lib/init.php';
require_once __DIR__ . '/../catalogue/CatalogueModel.php';

$catalogue_model = new CatalogueModel;
$first = $catalogue_model->getCatalogue('porter1');
p($first);



$make = 'Dummy';
$model = 'Dummy';




include __DIR__ . '/../../../templates/catalogue.html.php';
