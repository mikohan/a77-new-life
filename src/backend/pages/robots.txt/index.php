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
echo "Sitemap: $server_root/sitemap.xml";
