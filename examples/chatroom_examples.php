<?php
require __DIR__ . '/config.php';
use JMessage\IM\ChatRoom;

$room = new ChatRoom($jm);

$response = $room->listAll(10);
print_r($response);
