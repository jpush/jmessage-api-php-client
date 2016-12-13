<?php
namespace JMessage\Cross;
use JMessage\IM;

class Blacklist extends IM {

    const BASE_URI = 'https://api.im.jpush.cn/v1/cross/users/';

    public function add($appKey, $user, array $usernames) {
        $uri = self::BASE_URI . $user . '/blacklist';
        $body = [
            'appKey' => $appKey,
            'usernames' => $usernames
        ];
        $response = $this->put($uri, $body);
        return $response;
    }

    public function remove($appKey, $user, array $usernames) {
        $uri = self::BASE_URI . $user . '/blacklist';
        $body = [
            'appKey' => $appKey,
            'usernames' => $usernames
        ];
        $response = $this->del($uri, $body);
        return $response;
    }

    public function list($user) {
        $uri = self::BASE_URI . $user . '/blacklist';
        $response = $this->get($uri);
        return $response;
    }
}
