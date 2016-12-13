<?php
namespace JMessage\Cross;
use JMessage\IM;

class Nodisturb extends IM {

    const BASE_URI = 'https://api.im.jpush.cn/v1/cross/users/';

    public function single($appKey, $user, array $options) {
        $add = isset($options['add']) ? $options['add'] : [];
        $remove = isset($options['remove']) ? $options['remove'] : [];
        $body = [];
        if (!empty($options['add'])) {
            $body['add'] = $add;
        }
        if (!empty($options['remove'])) {
            $body['remove'] = $remove;
        }

        return $this->nodisturb($user, [ 'single' => $body ]);
    }

    public function group($appKey, $user, array $options) {
        $add = isset($options['add']) ? $options['add'] : [];
        $remove = isset($options['remove']) ? $options['remove'] : [];
        $body = [];
        if (!empty($options['add'])) {
            $body['add'] = $add;
        }
        if (!empty($options['remove'])) {
            $body['remove'] = $remove;
        }

        return $this->nodisturb($user, [ 'group' => $body ]);
    }

    public function nodisturb($user, array $options ) {
        $uri = self::BASE_URI . $user . '/nodisturb';
        $body = $options;
        $response = $this->post($uri, $body);
        return $response;
    }
}
