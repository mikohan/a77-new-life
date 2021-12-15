<?php
require_once(__DIR__ . '/../../lib/init.php');
require_once(__DIR__ . '/../blog/BlogModel.php');

$blog_model = new BlogModel;

$articles = $blog_model->getAllArticles();
// p($articles);
$tags = array_map(fn ($tag) => $tag['search_frase'], $articles);
$tags = array_filter($tags, fn ($tag) => $tag && $tag !== '');
$categories_tmp = array_slice($tags, 0, 8);

$latest_posts = array_slice($articles, 0, 4);
// p($tags);



require_once(__DIR__ . '/../../../templates/blog.html.php');
