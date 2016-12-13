<?php
namespace JMessage\Cross;
use JMessage\IM;

class Friend extends IM {

    const BASE_URI = 'https://api.im.jpush.cn/v1/cross/users/';

    public function add($appKey, $user, array $usernames) {
        $uri = self::BASE_URI . $user . '/friends';
        $body = [
            'appKey' => $appKey,
            'usernames' => $usernames
        ];
        $response = $this->post($uri, $body);
        return $response;
    }

    public function remove($appKey, $user, array $usernames) {
        $uri = self::BASE_URI . $user . '/friends';
        $body = [
            'appKey' => $appKey,
            'usernames' => $usernames
        ];
        $response = $this->del($uri, $body);
        return $response;
    }

    public function updateNotename($user, array $options) {
        $uri = self::BASE_URI . $user . '/friends';
        $response = $this->put($uri, $body);
        return $response;
    }
}
