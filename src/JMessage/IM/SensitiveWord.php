<?php
namespace JMessage\IM;
use JMessage\IM;

class SensitiveWord extends IM {

    const BASE_URI = 'https://api.im.jpush.cn/v1/sensitiveword';

    public function listAll($count, $start = 0) {
        $uri = self::BASE_URI;
        $query = [
            'start' => $start,
            'count' => $count
        ];

        $response = $this->get($uri, $query);
        return $response;
    }

    public function add(array $words) {
        $uri = self::BASE_URI;
        $body = $words;
        $response = $this->post($uri, $body);
        return $response;
    }

    public function delete($word) {
        $uri = self::BASE_URI;
        $body = ['word' => $word];
        $response = $this->del($uri, $body);
        return $response;
    }

    public function update($old, $new) {
        $uri = self::BASE_URI;
        $body = [
            'old_word' => $old,
            'new_word' => $new
        ];
        $response = $this->put($uri, $body);
        return $response;
    }

    public function getStatus() {
        $uri = self::BASE_URI . '/status';

        $response = $this->get($uri);
        return $response;
    }

    public function updateStatus($opened) {
        $uri = self::BASE_URI . '/status?status=' . (int)$opened;

        $response = $this->put($uri);
        return $response;
    }
}
