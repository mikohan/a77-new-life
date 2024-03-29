<?php
require_once(__DIR__ . '/../../lib/init.php');
require_once(__DIR__ . '/../blog/BlogModelBackend.php');



$post_id = $_GET['id'];
$url = BLOG_API_URL . "/wp/v2/posts/" . $post_id . "?_embed";

$blog_model = new BlogModelHTTP($url);


// try {
//   [$post, $prev, $next] = $blog_model->getArticle($slug);
// } catch (Throwable  $e) {
//   http_response_code(404);
//   header("Location: /404/");
//   exit();
// }

// $fmt = new IntlDateFormatter(
//   'ru_RU',
//   IntlDateFormatter::FULL,
//   IntlDateFormatter::FULL,
//   'America/Los_Angeles',
//   IntlDateFormatter::GREGORIAN
// );

$post = $blog_model->getAllArticlesBackend();
//p($post);
$main_image = $post['_embedded']['wp:featuredmedia'][0]['media_details']['sizes']['large']['source_url'];
$post_text = $post['content']['rendered'];
$post_title = $post['title']['rendered'];
$post_author_name = $post['_embedded']['author'][0]['name'];
$post_author_avatar = $post['_embedded']['author'][0]['avatar_urls'][96];

// p($post['_embedded']['author']);
$post_raw_date = new DateTime($post['date']);
$post_date = $post_raw_date->format('j F Y');

// $post_text = $post['']

// $prev_link = "blog/{$prev['slug']}/" ?? '/blog/';
// $prev_title = $prev['title'] ?? 'Блог';

// $next_link = "blog/{$next['slug']}/" ?? '/blog/';
//$next_title = 'Скоро будет';
// // Adding view when viewed
// $blog_model->incrementView($slug);
// // p($tags);
// $post_data_object  = new DateTime($post['date']);
// $post_date = $post_data_object->format('Y F d');

// $keywords = $post['meta_k'];
// $tags = preg_split("/\r\n|\n|\r/", $keywords);
// $tags = array_map(fn ($tag) => mb_ucfirst(rtrim($tag, ',')), $tags);

require_once(__DIR__ . '/../../../templates/post.html.php');
