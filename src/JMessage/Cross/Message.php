<?php
namespace JMessage\Cross;
use JMessage\IM\Message as IMMessage;

class Message extends IMMessage {

    public function sendText($version, $appKey, array $from, array $target, array $msg, array $notification = [], array $options = []) {
        $opts = array_merge($options, ['target_appkey' => $appKey]);
        return parent::sendText($version, $from, $target, $msg, $notification, $opts);
    }

    public function sendImage($version, $appKey, array $from, array $target, array $msg, array $notification = [], array $options = []) {
        $opts = array_merge($options, ['target_appkey' => $appKey]);
        return parent::sendImage($version, $from, $target, $msg, $notification, $opts);
    }

    public function sendVoice($version, $appKey, array $from, array $target, array $msg, array $notification = [], array $options = []) {
        $opts = array_merge($options, ['target_appkey' => $appKey]);
        return parent::sendVoice($version, $from, $target, $msg, $notification, $opts);
    }

    public function sendCustom($version, $appKey, array $from, array $target, array $msg, array $notification = [], array $options = []) {
        $opts = array_merge($options, ['target_appkey' => $appKey]);
        return parent::sendCustom($version, $from, $target, $msg, $notification, $opts);
    }
}
