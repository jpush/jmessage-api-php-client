<?php
namespace JMessage\IM;
use JMessage\IM;

class Admin extends IM {

    const BASE_URI = 'https://api.im.jpush.cn/v1/admins/';

    public function register(array $admin) {
        $uri = self::BASE_URI;
        $body = $admin;
        $response = $this->post($uri, $body);
        return $response;
    }

    public function listAll($start, $count) {
        $uri = self::BASE_URI;
        $query = [
            'start' => $start,
            'count' => $count
        ];
        $response = $this->get($uri, $query);
        return $response;
    }
}
