<?php
include __DIR__ . '/../../lib/init.php';
header('Content-type: text/plain');
$server_root = SERVER_ROOT_URL;

echo "User-agent: *";
echo PHP_EOL;
echo "Disallow: /*from=adwords";
echo PHP_EOL;
echo "Disallow: /*utm_source";
echo PHP_EOL;
echo "Disallow: /*utm_source";
echo PHP_EOL;
echo "Disallow: /blog-api*";
echo PHP_EOL;


echo "Disallow: /search/";
echo PHP_EOL;


echo "Disallow: /blog_search/";
echo PHP_EOL;


echo "Disallow: *.html";
echo PHP_EOL;

echo "Disallow: *?*";
echo PHP_EOL;


echo "Disallow: /cart/";
echo PHP_EOL;

echo "Disallow: /order/";
echo PHP_EOL;

echo "Disallow: /backend/";
echo PHP_EOL;

echo "Disallow: /logout/";
echo PHP_EOL;

echo "Disallow: /dashboard/";
echo PHP_EOL;

echo "Disallow: /edit-profile/";
echo PHP_EOL;

echo "Disallow: /my-orders/";
echo PHP_EOL;

echo "Sitemap: " . $server_root . "sitemap.xml";
echo PHP_EOL;



// /search/
// *blog_search*
// *.html
// *?*
// *?*
// *?*
// /cart/
// /order/
