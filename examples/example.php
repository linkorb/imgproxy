<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

$envFilename = __DIR__.'/../.env';
if (file_exists($envFilename)) {
    $dotenv = new Dotenv();
    $dotenv->load($envFilename);
}

$key = getenv('IMGPROXY_KEY');
$salt = getenv('IMGPROXY_SALT');
$serverUrl = getenv('IMGPROXY_SERVER_URL');

$imgUrl = 'https://upload.wikimedia.org/wikipedia/commons/1/15/Red_Apple.jpg';
$filter = 'resize:fill:300:400:0/gravity:sm';

$imgproxy = new Imgproxy\ImgproxyService($key, $salt, $serverUrl);
$url = $imgproxy->getUrl($imgUrl, $filter);

echo $url.PHP_EOL;
