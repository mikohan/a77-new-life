<?php
include __DIR__ . '/../../lib/init.php';
$server_root = SERVER_ROOT_URL;

echo <<<EOD
User-agent: *
Disallow: /*from=adwords
Disallow: /*utm_source
Sitemap: $server_root/sitemap.xml

User-agent: Yandex
Disallow: /*_openstat
Disallow: /*from=adwords
Disallow: /*utm_source
Sitemap: $server_root/sitemap.xml

User-agent: Googlebot
Disallow: /*_openstat
Disallow: /*from=adwords
Disallow: /*utm_source
Sitemap: $server_root/sitemap.xml
EOD;
