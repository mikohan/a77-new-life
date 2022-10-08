<?php
// ob_start();
ini_set('max_execution_time', 300);
include __DIR__ . '/../../lib/init.php';
include __DIR__ . '/../sitemap.xml/SitemapModel.php';
//require __DIR__ . '/../../../../vendor/autoload.php';

$sm = new SitemapModel;


header('Content-type: application/xml');
header("Content-Type: text/xml; charset=utf-8");


$cdate = date("Y-m-d H:i", time());
$today = new DateTime('today');

// Static pages
$all_pages = $sm->makeMeHappy();
$chunks = array_chunk($all_pages['productPages'], 1000);

// Here is the product working
$chs = [];


$today->modify('-40 days');
$mod_date = $today->format('Y-m-d');
$home = '<url><loc>' . $all_pages['homePage'][0] . '</loc><lastmod>' . $mod_date . '</lastmod><priority>1.0</priority></url>';
$chs[] = $home;



foreach ($all_pages['staticPages'] as $cats) {
  $today = new DateTime('today');
  $today->modify('-70 days');
  $mod_date = $today->format('Y-m-d');
  $stat = '<url><loc>' . $cats . '</loc><lastmod>' . $mod_date . '</lastmod><priority>0.5</priority></url>';
  $chs[] = $stat;
}

foreach ($all_pages['blogPages'] as $cats) {
  $today = new DateTime('today');
  $today->modify('-25 days');
  $mod_date = $today->format('Y-m-d');
  $blog = '<url><loc>' . $cats . '</loc><lastmod>' . $mod_date . '</lastmod><priority>0.5</priority></url>';
  $chs[] = $blog;
}


foreach ($chunks as $key => $chunk) {

  $today = new DateTime('today');
  $today->modify('-' . $key + 3 . ' days');
  $mod_date = $today->format('Y-m-d');
  $ch = array_map(fn ($item) => '<url><loc>' . $item . '</loc><lastmod>' . $mod_date . '</lastmod><priority>0.8</priority></url>', $chunk);
  foreach ($ch as $c) {
    $chs[] = $c;
  }
}

// Here is the categories working
foreach ($all_pages['categoriesPages'] as $cats) {

  $today = new DateTime('today');
  $today->modify('-7 days');
  $mod_date = $today->format('Y-m-d');
  $cat = '<url><loc>' . $cats . '</loc><lastmod>' . $mod_date . '</lastmod><priority>0.6</priority></url>';
  $chs[] = $cat;
}


$arr = array_merge($chs);


// p(array_chunk($pages_arrays['productPages'], 1000));

// $return = array_map(fn ($item) => "<loc>" . $item . "</loc>", $return);

$loc = '';
foreach ($arr as $i => $page) {
  $loc .= $page;
}





$head = <<<EOD
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   $loc 
</urlset>
EOD;
echo $head;
