<?php
namespace JMessage\IM;
use JMessage\IM;

class Message extends IM {

    const BASE_URI = 'https://api.im.jpush.cn/v1/messages';

    public function sendText($version, array $from, array $target, array $msg, array $notification = [], $options = []) {
        $opts = array_merge([
            'msg_type' => 'text',
            'msg_body' => [
                'text' => $msg['text']
            ]
        ], $this->buildMessage($version, $from, $target, $notification));

        if (isset($msg['extras']) && is_array($msg['extras'])) {
            $opts['msg_body']['extras'] = $msg['extras'];
        }
        return $this->send($opts);
    }

    public function sendImage($version, array $from, array $target, array $msg, array $notification = [], $options = []) {
        $opts = array_merge([
            'msg_type' => 'image',
            'msg_body' => [
                'media_id'    => $msg['media_id'],
                'media_crc32' => $msg['media_crc32'],
                'width'       => $msg['width'],
                'height'      => $msg['height'],
                'format'      => $msg['format'],
                'fsize'       => $msg['fsize']
            ]
        ], $this->buildMessage($version, $from, $target, $notification, ));

        return $this->send($opts);
    }

    public function sendVoice($version, array $from, array $target, array $msg, array $notification = [], $options = []) {
        $opts = array_merge([
            'msg_type' => 'voice',
            'msg_body' => [
                'media_id'    => $msg['media_id'],
                'media_crc32' => $msg['media_crc32'],
                'duration'    => $msg['duration'],
                'hash'        => $msg['hash'],
                'fsize'       => $msg['fsize']
            ]
        ], $this->buildMessage($version, $from, $target, $notification));

        return $this->send($opts);
    }

    public function sendCustom($version, array $from, array $target, array $msg, array $notification = [], $options = []) {
        $opts = array_merge([
            'msg_type' => 'custom',
            'msg_body' => $msg
        ], $this->buildMessage($version, $from, $target, $notification));

        return $this->send($opts);
    }

    private function buildMessage($version, array $from, array $target, array $notification = [], $options = []) {
        $opts = [
            'version'     => $version,
            'target_type' => $target['type'],
            'from_type'   => $from['type'],
            'target_id'   => $target['id'],
            'from_id'     => $from['id']
        ];
        if (isset($from['name'])) {
            $opts['from_name'] = $from['name'];
        }
        if (isset($target['name'])) {
            $opts['target_name'] = $target['name'];
        }
        if (isset($options['offline'])) {
            $opts['no_offline'] = !$options['offline'];
        }

        if (isset($notification['notifiable'])){
            $opts['no_notification'] = !$notification['notifiable'];
        }
        if (isset($notification['title'])){
            $opts['notification']['title'] = $notification['title'];
        }
        if (isset($notification['alert'])){
            $opts['notification']['alert'] = $notification['alert'];
        }
        return $opts;
    }

    public function send($options) {
        $uri = self::BASE_URI;
        $body = $options;
        $response = $this->post($uri, $body);
        return $response;
    }

    public function retract($msgid, $username) {
        $uri = self::BASE_URI . '/' . $username . '/' . $msgid . 'retract';
        $response = $this->post($uri);
        return $response;
    }
}
