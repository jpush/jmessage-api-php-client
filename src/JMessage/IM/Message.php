<?php
namespace JMessage\IM;
use JMessage\IM;

class Message extends IM {

    const BASE_URI = 'https://api.im.jpush.cn/v1/messages';

    public function sendText($version, array $from, array $target, array $msg) {
        $options = [
            'version' => $version;
            'target_type' => $target['type'],
            'from_type' => $from['type'],
            'msg_type' => 'text',
            'target_id' => $target['id'],
            'from_id' => $from['id'],
            'msg_body' => [
                'text' => $msg['text']
            ]
        ];
        if (isset($from['name'])) {
            $options['from_name'] = $from['name'];
        }
        if (isset($target['name'])) {
            $options['target_name'] = $target['name'];
        }
        if (isset($msg['extras']) && is_array($msg['extras'])) {
            $options['msg_body']['extras'] = $msg['extras'];
        }
        return $this->send($options);
    }

    public function sendImage($version, array $from, array $target, array $msg) {
        $options = [
            'version' => $version;
            'target_type' => $target['type'],
            'from_type' => $from['type'],
            'msg_type' => 'image',
            'target_id' => $target['id'],
            'from_id' => $from['id'],
            'msg_body' => [
                'media_id' => $msg['mediaId'],
                'media_crc32' => $msg['mediaCrc32'],
                'width' => $msg['width'],
                'height' => $msg['height'],
                'format' => $msg['format'],
                'fsize' => $msg['fsize']
            ]
        ];
        if (isset($from['name'])) {
            $options['from_name'] = $from['name'];
        }
        if (isset($target['name'])) {
            $options['target_name'] = $target['name'];
        }
        if (isset($msg['extras']) && is_array($msg['extras'])) {
            $options['msg_body']['extras'] = $msg['extras'];
        }
        return $this->send($options);
    }
    public function sendCustom($version, array $from, array $target, array $msg) {
        $options = [
            'version' => $version;
            'target_type' => $target['type'],
            'from_type' => $from['type'],
            'msg_type' => 'custom',
            'target_id' => $target['id'],
            'from_id' => $from['id'],
            'msg_body' => $msg
        ];
        if (isset($from['name'])) {
            $options['from_name'] = $from['name'];
        }
        if (isset($target['name'])) {
            $options['target_name'] = $target['name'];
        }
        return $this->send($options);
    }

    public function send($options) {
        $uri = self::BASE_URI;
        $body = $options;
        $response = $this->post($uri, $body);
        return $response;
    }
}
