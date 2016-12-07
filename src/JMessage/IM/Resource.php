<?php
namespace JMessage\IM;
use JMessage\Http\Client;

class Resource {

    const BASE_URI = 'https://api.im.jpush.cn/v1/resource';
    private $client;

    public function __construct($client) {
        $this->client = Client::getInstance($client);
    }

    public function download($mediaId) {
        $uri = self::BASE_URI;
        $query = [ 'mediaId' => $mediaId ];
        $response = $this->client->get($uri, $query);
        return $response;
    }

    public function upload($type, $path) {
        $uri = self::BASE_URI . '?' . http_build_query(['type' => $type]);
        $body = ['path' => $path];
        $response = $this->client->upload($uri, $body);
        return $response;
    }
}
