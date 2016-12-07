<?php
namespace JMessage\IM;
use JMessage\Http\Client;

class Message {

    const BASE_URI = 'https://api.im.jpush.cn/v1/messages';
    private $client;

    public function __construct($client) {
        $this->client = Client::getInstance($client);
    }

}
