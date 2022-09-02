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
} elseif (isset($_GET['blog_tag'])) {
  $url = BLOG_API_URL .  "/wp/v2/posts?_embed&tags=" . $_GET['blog_tag'];
} elseif (isset($_GET['blog_search'])) {
  $url = BLOG_API_URL .  "/wp/v2/search?search=" . urlencode($_GET['blog_search']);
} else {
  $url = BLOG_API_URL .  "/wp/v2/posts?_embed&per_page=" . BLOG_PER_PAGE;
}
if (isset($_GET['page_number'])) {
  $url = $url . '&page=' . $_GET['page_number'];
}


$blog_model = new BlogModelHTTP($url);

$articles = $blog_model->getAllArticlesBackend(null);
$latest_post_get_url = BLOG_API_URL . '/wp/v2/posts?_embed&per_page=5';

$obj_lstest_post = new BlogModelHTTP($latest_post_get_url);
$latest_posts =  $obj_lstest_post->getAllArticlesBackend();
$categories = $blog_model->getAllCategories();



$tags_url = BLOG_API_URL . '/wp/v2/tags';
$obj_tags = new BlogModelHTTP($tags_url);
$tags = $obj_tags->getAllArticlesBackend(null);




require_once(__DIR__ . '/../../../templates/blog.html.php');
