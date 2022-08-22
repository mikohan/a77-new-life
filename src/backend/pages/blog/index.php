<?php
require_once(__DIR__ . '/../../lib/init.php');
// require_once(__DIR__ . '/../blog/BlogModel.php');
require_once(__DIR__ . '/../blog/BlogModelBackend.php');

//$blog_model = new BlogModel;
if ($_GET['post_id']) {
  $id = $_GET['post_id'];
  $url = BLOG_API_URL . "/wp/v2/posts" . $id . "?_embed";
} elseif ($_GET['category_id']) {
  $category_id = $_GET['category_id'];
  $url = BLOG_API_URL . "/wp/v2/posts/?_embed&categories=" . $category_id;
} else {
  $url = BLOG_API_URL .  "/wp/v2/posts?_embed";
}

$blog_model = new BlogModelHTTP($url);



$articles = $blog_model->getAllArticlesBackend(null);
$latest_post_get_url = BLOG_API_URL . '/wp/v2/posts?_embed&filter[posts_per_page]=5';
$obj_lstest_post = new BlogModelHTTP($latest_post_get_url);
$latest_posts =  $obj_lstest_post->getAllArticlesBackend();
$categories = $blog_model->getAllCategories();
// p($latest_posts);

// $tags = array_map(fn ($tag) => $tag['search_frase'], $articles);
// $tags = array_filter($tags, fn ($tag) => $tag && $tag !== '');
// $categories_tmp = array_slice($tags, 0, 8);

// $latest_posts = array_slice($articles, 0, 4);
// p($tags);

// $articles = $blog_model->getAllArticlesBackend(null);
// p($articles);


require_once(__DIR__ . '/../../../templates/blog.html.php');
