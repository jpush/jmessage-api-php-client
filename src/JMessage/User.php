<?php

namespace JMessage;
use JMessage\Http\Client;

class User {

    const BASE_URI = 'https://api.im.jpush.cn/v1/users/';
    private $client;

    public function __construct($client) {
        $this->client = Client::getInstance($client);
    }

    public function register(array $users) {
        $uri = self::BASE_URI;
    }

    public function getUser($username) {
        $uri = self::BASE_URI . $username;
        $response = $this->client->get($uri);
        return $response;
    }

    public function userStat($username) {
        $uri = self::BASE_URI . $username . '/userstat';
        $response = $this->client->get($uri);
        return $response;
    }
}
