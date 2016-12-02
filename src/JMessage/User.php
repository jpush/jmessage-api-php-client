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
        $body = $users;
        $response = $this->client->post($uri, $body);
        return $response;
    }

    public function getUser($username) {
        $uri = self::BASE_URI . $username;
        $response = $this->client->get($uri);
        return $response;
    }

    public function updateUser($username, array $options) {
        $uri = self::BASE_URI . $username;
        $body = $options;
        $response = $this->client->put($uri, $body);
        return $response;
    }

    public function userStat($username) {
        $uri = self::BASE_URI . $username . '/userstat';
        $response = $this->client->get($uri);
        return $response;
    }

    public function changePassword($username, $password) {
        $uri = self::BASE_URI . $username . '/password';
        $response = $this->client->put($uri, [ 'new_password' => $password ]);
        return $response;
    }

    public function deleteUser($username) {
        $uri = self::BASE_URI . $username;
        $response = $this->client->delete($uri);
        return $response;
    }

    public function getUsers($start = 0, $count = 10) {
        $uri = self::BASE_URI;
        $query = [
            'start' => $start,
            'count' => $count
        ];
        $response = $this->client->get($uri, $query);
        return $response;
    }

}
