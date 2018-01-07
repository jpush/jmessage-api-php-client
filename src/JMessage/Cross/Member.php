<?php
namespace JMessage\Cross;
use JMessage\IM;

class Member extends IM {

    const BASE_URI = 'https://api.im.jpush.cn/v1/cross/groups/';

    public function add($gid, $appKey, array $usernames) {
        $body = [[
            'appkey' => $appKey,
            'add' => $usernames
        ]];
        return $this->update($gid, $body);
    }

    public function remove($gid, $appKey, array $usernames) {
        $body = [[
            'appkey' => $appKey,
            'remove' => $usernames
        ]];
        return $this->update($gid, $body);
    }

    public function update($gid, array $options) {
        $uri = self::BASE_URI . $gid . '/members';
        $body = $options;
        $response = $this->post($uri, $body);
        return $response;
    }

    public function listAll($gid) {
        $uri = self::BASE_URI . $gid . '/members';
        $response = $this->get($uri);
        return $response;
    }
}
