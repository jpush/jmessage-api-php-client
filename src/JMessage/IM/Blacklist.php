<?php
namespace JMessage\IM;
use JMessage\IM;

class Blacklist extends IM {

    const BASE_URI = 'https://api.im.jpush.cn/v1/users/';

    public function add($user, array $usernames) {
        $uri = self::BASE_URI . $user . '/blacklist';
        $body = $usernames;
        $response = $this->put($uri, $body);
        return $response;
    }

    public function remove($user, array $usernames) {
        $uri = self::BASE_URI . $user . '/blacklist';
        $body = $usernames;
        $response = $this->del($uri, $body);
        return $response;
    }

    public function listAll($user) {
        $uri = self::BASE_URI . $user . '/blacklist';
        $response = $this->get($uri);
        return $response;
    }
}
