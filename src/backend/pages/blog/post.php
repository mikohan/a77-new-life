<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once(__DIR__ . '/../../lib/init.php');
require_once(__DIR__ . '/../blog/BlogModel.php');

$blog_model = new BlogModel;
$slug = $_GET['slug'];


$post = $blog_model->getArticle($slug);
// p($tags);



require_once(__DIR__ . '/../../../templates/post.html.php');
