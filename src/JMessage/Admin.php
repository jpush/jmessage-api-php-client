<?php

namespace JMessage;
use JMessage\Http\Client;

class Admin {

    const BASE_URI = 'https://api.im.jpush.cn/v1/admins/';
    private $client;

    public function __construct($client) {
        $this->client = Client::getInstance($client);
    }

    public function register(array $admin) {
        $uri = self::BASE_URI;
        $body = $admin;
        $response = $this->client->post($uri, $body);
        return $response;
    }

    public function getAdmins($start = 0, $count = 10) {
        $uri = self::BASE_URI;
        $query = [
            'start' => $start,
            'count' => $count
        ];
        $response = $this->client->get($uri, $query);
        return $response;
    }

    public function userStat($username) {
        $uri = self::BASE_URI . $username . '/userstat';
        $response = $this->client->get($uri);
        return $response;
    }
}
