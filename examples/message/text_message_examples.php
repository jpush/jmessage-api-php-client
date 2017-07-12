<?php
require __DIR__ . '/../config.php';
use JMessage\IM\Message;

$message = new Message($jm);

$from = [
    'id'   => 'admin',
    'type' => 'admin'
];

$target = [
    'id'   => 'user_10',
    'type' => 'single'
];
$msg = [
   'text' => 'Hello World'
];
$response = $message->sendText(1, $from, $target, $msg);
print_r($response);

