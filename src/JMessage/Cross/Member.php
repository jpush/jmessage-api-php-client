<?php
namespace JMessage\Cross;
use JMessage\IM;

class Member extends IM {

    const BASE_URI = 'https://api.im.jpush.cn/v1/cross/groups/';

    public function add($appKey, $gid, array $usernames) {
        $uri = self::BASE_URI . $gid . '/members';
        $body = [
            'appKey' => $appKey,
            'add' => $usernames
        ];
        $response = $this->post($uri, $body);
        return $response;
    }

    public function remove($appKey, $gid, array $usernames) {
        $uri = self::BASE_URI . $gid . '/members';
        $body = [
            'appKey' => $appKey,
            'add' => $usernames
        ];
        $response = $this->del($uri, $body);
        return $response;
    }

    public function list($gid) {
        $uri = self::BASE_URI . $gid . '/members';
        $response = $this->get($uri);
        return $response;
    }
}
