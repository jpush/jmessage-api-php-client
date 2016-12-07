<?php
namespace JMessage\IM;
use JMessage\IM;

class Resource extends IM {

    const BASE_URI = 'https://api.im.jpush.cn/v1/resource';

    public function download($mediaId) {
        $uri = self::BASE_URI;
        $query = [ 'mediaId' => $mediaId ];
        $response = $this->get($uri, $query);
        return $response;
    }

    public function upload($type, $path) {
        $uri = self::BASE_URI . '?' . http_build_query(['type' => $type]);
        $body = ['path' => $path];
        $response = $this->getClient()->upload($uri, $body);
        return $response;
    }
}
