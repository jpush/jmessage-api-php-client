<?php
namespace JMessage\IM;
use JMessage\Http\Client;

class Friend {

    const BASE_URI = 'https://api.im.jpush.cn/v1/users/';
    private $client;

    public function __construct($client) {
        $this->client = Client::getInstance($client);
    }

    public function add($user, array $friends) {
        $uri = self::BASE_URI . $user . '/friends';
        $body = $friends;
        $response = $this->client->post($uri, $body);
        return $response;
    }

    public function remove($user, array $friends) {
        $uri = self::BASE_URI . $user . '/friends';
        $body = $friends;
        $response = $this->client->delete($uri, $body);
        return $response;
    }

    public function updateNotename($user, array $options) {
        $uri = self::BASE_URI . $user . '/friends';
        $body = $options;
        $response = $this->client->put($uri, $body);
        return $response;
    }

    public function list($user) {
        $uri = self::BASE_URI . $user . '/friends';
        $response = $this->client->get($uri);
        return $response;
    }

}
