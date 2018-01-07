<?php
namespace JMessage\Cross;
use JMessage\IM;

class Nodisturb extends IM {

    const BASE_URI = 'https://api.im.jpush.cn/v1/cross/users/';

    public function single($user, $appKey, array $options) {
        $body = [ 'appkey' => $appKey ];
        if (!isset($options['add'])) {
            $body['single']['add'] = $options['add'];
        }
        if (!isset($options['remove'])) {
            $body['single']['remove'] = $options['remove'];
        }

        return $this->nodisturb($user, [$body]);
    }

    public function group($user, $appKey, array $options) {
        $body = [ 'appkey' => $appKey ];
        if (!isset($options['add'])) {
            $body['group']['add'] = $options['add'];
        }
        if (!isset($options['remove'])) {
            $body['group']['remove'] = $options['remove'];
        }

        return $this->nodisturb($user, [$body]);
    }

    public function nodisturb($user, array $options ) {
        $uri = self::BASE_URI . $user . '/nodisturb';
        $body = $options;
        $response = $this->post($uri, $body);
        return $response;
    }
}
