<?php
namespace JMessage\Cross;
use JMessage\IM;

class Friend extends IM {

    const BASE_URI = 'https://api.im.jpush.cn/v1/cross/users/';

    public function add($user, $appKey, array $friendnames) {
        $uri = self::BASE_URI . $user . '/friends';
        $body = [
            'appKey' => $appKey,
            'users' => $friendnames
        ];
        $response = $this->post($uri, $body);
        return $response;
    }

    public function remove($user, $appKey, array $friendnames) {
        $uri = self::BASE_URI . $user . '/friends';
        $body = [
            'appKey' => $appKey,
            'users' => $friendnames
        ];
        $response = $this->del($uri, $body);
        return $response;
    }

    public function updateNotename($user, $appKey, $friendname, array $options) {
        $body = [
            'appKey' => $appKey,
            'username' => $friendname
        ];

        if (isset($options['note_name'])) {
            $body['note_name'] = $options['note_name'];
        }

        if (isset($options['others'])) {
            $body['others'] = $options['others'];
        }

        return $this->batchUpdateNotename($user, [$body]);
    }

    public function batchUpdateNotename($user, array $options) {
        $uri = self::BASE_URI . $user . '/friends';
        $response = $this->put($uri, $body);
        return $response;
    }
}
