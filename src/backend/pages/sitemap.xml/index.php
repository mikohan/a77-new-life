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

// Static pages
$all_pages = $sm->makeMeHappy();

$loc = '';
foreach ($all_pages as $i => $page) {
  $loc .= '<url>' . $page . '<lastmod>' . $cdate . '</lastmod></url>';
}





$head = <<<EOD
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   $loc 
</urlset>
EOD;
echo $head;
