<?php
namespace JMessage\IM;
use JMessage\IM;

class Friend extends IM {

    const BASE_URI = 'https://api.im.jpush.cn/v1/users/';

    public function add($user, array $friends) {
        $uri = self::BASE_URI . $user . '/friends';
        $body = $friends;
        $response = $this->post($uri, $body);
        return $response;
    }

    public function remove($user, array $friends) {
        $uri = self::BASE_URI . $user . '/friends';
        $body = $friends;
        $response = $this->del($uri, $body);
        return $response;
    }

    public function updateNotename($user, array $options) {
        $uri = self::BASE_URI . $user . '/friends';
        $body = $options;
        $response = $this->put($uri, $body);
        return $response;
    }

    public function listAll($user) {
        $uri = self::BASE_URI . $user . '/friends';
        $response = $this->get($uri);
        return $response;
    }

}
