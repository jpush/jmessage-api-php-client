<?php

namespace JMessage\IM;
use JMessage\Http\Client;

class Member {

    const BASE_URI = 'https://api.im.jpush.cn/v1/groups/';
    private $client;

    public function __construct($client) {
        $this->client = Client::getInstance($client);
    }

    public function add($gid, array $members) {}
    public function remove($gid, array $members) {}
    public function update($gid, array $members) {}


    public function getList($gid) {
        $uri = self::BASE_URI . $gid . '/members';
        $response = $this->client->get($uri);
        return $response;
    }

}
