<?php
require __DIR__ . '/../config.php';
use JMessage\IM\Message;
use JMessage\IM\Resource;

$rescource = new Resource($jm);
$message = new Message($jm);

$image = __DIR__ . '/../jiguang.png';

echo "upload image: \n";
$response = $rescource->upload('image', $image);
print_r($response);
echo "\n";

$body = $response['body'];

$from = [
    'id'   => 'admin',
    'type' => 'admin'
];

$target = [
    'id'   => 'user_10',
    'type' => 'single'
];

$msg = $body;

$response = $message->sendImage(1, $from, $target, $msg);
print_r($response);
