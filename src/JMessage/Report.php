<?php
namespace JMessage;
use JMessage\Http;

class Report extends IM {

    const BASE_URL = 'https://report.im.jpush.cn/v1/';

    public function getMessages($start, $count, $beginTime = null, $endTime = null) {
        $uri = self::BASE_URL . 'messages';
        return $this->report($uri, $start, $count, $beginTime, $endTime);
    }

    public function getUserMessages($username, $start, $count, $beginTime = null, $endTime = null) {
        $uri = self::BASE_URL . '/users/' . $username . '/messages';
        return $this->report($uri, $start, $count, $beginTime, $endTime);
    }

    private function report($uri, $start, $count, $beginTime = null, $endTime = null) {
        $query = [
            'start' => $start,
            'count' => $count
        ];

        if (!is_null($beginTime)) {
            $query['begin_time'] = $beginTime;
        }
        if (!is_null($endTime)) {
            $query['end_time'] = $endTime;
        }
        return $this->get($uri, $query);
    }
}
