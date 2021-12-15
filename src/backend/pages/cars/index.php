<?php
session_start();
/**
 * 1) Latest news 6 pieses
 * 2) Featured(Last arrivals better) prorudts total 10 pis
 * 3) Sales block and sales page also if not will be lazy
 * 4) Three column block at bottom 9 total
 * Plan
 * All that stuff probably get from one endpoint which is has not been created yet
 * after fetching we will cache in mysql table of course
 * Also needs to implement logic to get old photos glob like and cache it after
 */
require_once __DIR__ . '/../../lib/init.php';
require_once __DIR__ . '/../cars/CarsModel.php';

$home_model = new HomeModel;

$features = $home_model->getProductsForHomePage();
$posts = $home_model->getLatestPosts();
// All cars we are getting from Header
require_once __DIR__ . '/../../../templates/cars.html.php';
