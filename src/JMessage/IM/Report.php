<?php
namespace JMessage\IM;
use JMessage\IM;

class Report extends IM {

    const BASE_URL_V1 = 'https://report.im.jpush.cn/v1/';
    const BASE_URL    = 'https://report.im.jpush.cn/v2/';

    public function getMessagesV1($start, $count, $beginTime = null, $endTime = null) {
        $uri = self::BASE_URL_V1 . 'messages';
        return $this->reportV1($uri, $start, $count, $beginTime, $endTime);
    }

    public function getUserMessagesV1($username, $start, $count, $beginTime = null, $endTime = null) {
        $uri = self::BASE_URL_V1 . '/users/' . $username . '/messages';
        return $this->reportV1($uri, $start, $count, $beginTime, $endTime);
    }

    private function reportV1($uri, $start, $count, $beginTime = null, $endTime = null) {
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

    public function getMessages($count, $beginTime, $endTime) {
        $uri = self::BASE_URL . 'messages';
        return $this->report($uri, $count, $beginTime, $endTime);
    }

    public function getNextMessages($cursor) {
        $uri = self::BASE_URL . 'messages';
        return $this->get($uri, [ 'cursor' => $cursor ]);
    }

    public function getUserMessages($username, $count, $beginTime, $endTime) {
        $uri = self::BASE_URL . 'users/' . $username . '/messages';
        return $this->report($uri, $count, $beginTime, $endTime);
    }

    public function getNextUserMessages($username, $cursor) {
        $uri = self::BASE_URL . 'users/' . $username . '/messages';
        return $this->get($uri, [ 'cursor' => $cursor ]);
    }

    public function getGroupMessages($gid, $count, $beginTime, $endTime) {
        $uri = self::BASE_URL . 'groups/' . $gid . '/messages';
        return $this->report($uri, $count, $beginTime, $endTime);
    }

    public function getNextGroupMessages($gid, $cursor) {
        $uri = self::BASE_URL . 'groups/' . $gid . '/messages';
        return $this->get($uri, [ 'cursor' => $cursor ]);
    }

    public function messages($timeUnit, $start, $duration) {
        $uri = self::BASE_URL . '/statistic/messages';
        return $this->statistic($uri, $timeUnit, $start, $duration);
    }

    public function users($timeUnit, $start, $duration) {
        $uri = self::BASE_URL . '/statistic/users';
        return $this->statistic($uri, $timeUnit, $start, $duration);
    }

    public function groups($timeUnit, $start, $duration) {
        $uri = self::BASE_URL . '/statistic/groups';
        return $this->statistic($uri, $timeUnit, $start, $duration);
    }


    private function report($uri, $count, $beginTime, $endTime) {
        $query = [
            'count'         => $count,
            'begin_time'    => $beginTime,
            'end_time'      => $endTime
        ];
        return $this->get($uri, $query);
    }

    private function statistic($uri, $timeUnit, $start, $duration) {
        $query = [
            'time_unit' => $timeUnit,
            'start'     => $start,
            'duration'  => $duration
        ];
        return $this->get($uri, $query);
    }
}
