<?php
require_once(__DIR__ . '/../../lib/init.php');
require_once(__DIR__ . '/../blog/BlogModel.php');

$blog_model = new BlogModel;
$slug = $_GET['slug'];


try {
  [$post, $prev, $next] = $blog_model->getArticle($slug);
} catch (Throwable  $e) {
  http_response_code(404);
  header("Location: /404/");
  exit();
}

$prev_link = "blog/{$prev['slug']}/" ?? '/blog/';
$prev_title = $prev['title'] ?? 'Блог';

$next_link = "blog/{$next['slug']}/" ?? '/blog/';
$next_title = $next['title'] ?? 'Блог';
// Adding view when viewed
$blog_model->incrementView($slug);
// p($tags);
$post_data_object  = new DateTime($post['date']);
$post_date = $post_data_object->format('Y F d');

$keywords = $post['meta_k'];
$tags = preg_split("/\r\n|\n|\r/", $keywords);
$tags = array_map(fn ($tag) => mb_ucfirst(rtrim($tag, ',')), $tags);

require_once(__DIR__ . '/../../../templates/post.html.php');
