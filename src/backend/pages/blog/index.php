<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once(__DIR__ . '/../../lib/init.php');
require_once(__DIR__ . '/../blog/BlogModel.php');

$blog_model = new BlogModel;

$articles = $blog_model->getAllArticles();
p($articles);



require_once(__DIR__ . '/../../../templates/blog.html.php');
