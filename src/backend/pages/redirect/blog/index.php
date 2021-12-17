<?php
require_once __DIR__ . '/../../../lib/init.php';
include __DIR__ . '/../data/redirect_data.php';
require_once __DIR__ . '/../../blog/BlogModel.php';

$blog_obj = new BlogModel;


$id = $_GET['id'];
$blog_post = $blog_obj->getArticleById($id);
if ($blog_post) {
  $url = $u->blogPost($blog_post['slug']);

  header("Location: {$url}", TRUE, 301);
} else {
  http_response_code(404);
  header("Location: /404/");
  exit();
}
