<?php
namespace JMessage\Cross;
use JMessage\IM;

class Blacklist extends IM {

    const BASE_URI = 'https://api.im.jpush.cn/v1/cross/users/';

    public function add($user, $appKey, array $usernames) {
        $body = [[
            'appKey' => $appKey,
            'usernames' => $usernames
        ]];
        return $this->batchAdd($user, $body)
    }

    public function batchAdd($user, array $options) {
        $uri = self::BASE_URI . $user . '/blacklist';
        $body = $options;
        $response = $this->put($uri, $body);
        return $response;
    }

    public function remove($user, $appKey, array $usernames) {
        $body = [[
            'appKey' => $appKey,
            'usernames' => $usernames
        ]];
        return $this->batchRemove($user, $body)
    }

    public function batchRemove($user, array $options) {
        $uri = self::BASE_URI . $user . '/blacklist';
        $body = $options;
        $response = $this->del($uri, $body);
        return $response;
    }

    public function list($user) {
        $uri = self::BASE_URI . $user . '/blacklist';
        $response = $this->get($uri);
        return $response;
    }
}
