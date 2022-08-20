<?php
require_once(__DIR__ . '/../../lib/init.php');
// require_once(__DIR__ . '/../blog/BlogModel.php');
require_once(__DIR__ . '/../blog/BlogModelBackend.php');

//$blog_model = new BlogModel;
$blog_model = new BlogModelHTTP(BLOG_API_URL);

$articles = $blog_model->getAllArticlesBackend(null);
// $tags = array_map(fn ($tag) => $tag['search_frase'], $articles);
// $tags = array_filter($tags, fn ($tag) => $tag && $tag !== '');
// $categories_tmp = array_slice($tags, 0, 8);

// $latest_posts = array_slice($articles, 0, 4);
// p($tags);

// $articles = $blog_model->getAllArticlesBackend(null);
// p($articles);


require_once(__DIR__ . '/../../../templates/blog.html.php');
