<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../../lib/init.php';
require_once __DIR__ . '/header.Model.php';

/**
 * 1) Clear up get and save all categories if not needed any more
 * 2) Rename all images for header by car slug
 */


$header = new HeaderModel;

$apiHeader = new ApiHeader;
$header_categories = $apiHeader->getCategoriesFromMysql();

// Getting all cars and stuff
$get_all_cars = $apiHeader->getCarsFromApi();
$all_cars = array_slice($get_all_cars, 0, 20);
usort($all_cars, function ($a, $b) {
  return $b->priority <=> $a->priority;
});
// p($all_cars[0]->categories);

function makeSubCategoreies($car)
/**
 * Making first and second level of categoreis for menu factory
 */
{
  $cats = $car->categories;
  $zerro = [];
  foreach ($cats as $cat) {

    if ($cat->level === 1) {
      $zerro[] = $cat;
    }
  }

  foreach ($zerro as $z) {
    $one = [];
    foreach ($cats as $c) {
      if ($c->parent === $z->id) {
        $one[] = $c;
      }
    }
    $z->children = $one;
  }
  return $zerro;
}

//$articles = $header->getArticlesByCar();

//$catalogues = $header->catalogues();

// p($_SESSION['carname']);

// Here Including html file at the end
require_once __DIR__ . '/header.html.php';
