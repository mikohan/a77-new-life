<?php
// ob_start();
ini_set('max_execution_time', 300);
error_reporting(E_ALL);
ini_set("display_errors", 1);
include __DIR__ . '/../../lib/init.php';
include __DIR__ . '/../sitemap.xml/SitemapModel.php';

$sm = new SiteMap;


header('Content-type: application/xml');
header("Content-Type: text/xml; charset=utf-8");


$cdate = date("Y-m-d H:i", time());



$out = '<?xml version="1.0" encoding="utf-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
 xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
 xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

$head = <<<EOD
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc>http://www.example.com/foo.html</loc>
    <lastmod>2018-06-04</lastmod>
  </url>
</urlset>
EOD;
