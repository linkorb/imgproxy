<?php

namespace  Imgproxy;

class ImgproxyService
{
    private $key;
    private $salt;
    private $serverUrl;
    private $extension;

    public function __construct($key, $salt, $serverUrl, $extension = 'png')
    {
        $this->key = $key;
        $this->salt = $salt;
        $this->serverUrl = $serverUrl;
        $this->extends = $extension;
    }

    public function getUrl($url, $filter)
    {
        $keyBin = pack('H*', $this->key);
        if (empty($keyBin)) {
            die('Key expected to be hex-encoded string');
        }
        $saltBin = pack('H*', $this->salt);
        if (empty($saltBin)) {
            die('Salt expected to be hex-encoded string');
        }

        $encodedUrl = rtrim(strtr(base64_encode($url), '+/', '-_'), '=');

        $path = "/{$filter}/{$encodedUrl}.{$this->extends}";

        $signature = rtrim(strtr(base64_encode(hash_hmac('sha256', $saltBin.$path, $keyBin, true)), '+/', '-_'), '=');

        return $this->serverUrl.sprintf('/%s%s', $signature, $path);
    }
}
