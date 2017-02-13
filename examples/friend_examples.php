<?php
require __DIR__ . '/config.php';
use JMessage\IM\Friend;

$friend = new Friend($jm);
$user = 'user_0';
$friends = ['user_1', 'user_2'];

echo "list friends: \n";
$response = $friend->listAll($user);
print_r($response);
echo "\n";

echo "add friends: \n";
$response = $friend->add($user, $friends);
print_r($response);
echo "\n";

echo "list friends: \n";
$response = $friend->listAll($user);
print_r($response);
echo "\n";

echo "update notename of friends: \n";
$response = $friend->updateNotename($user, [
    [
        'username' => 'user_1',
        'note_name' => 'user_1_alias',
        'others' => 'good friend'
    ], [
        'username' => 'user_2',
        'note_name' => 'user_2_alias',
        'others' => 'normal friend'
    ]
]);
print_r($response);
echo "\n";

echo "list friends: \n";
$response = $friend->listAll($user);
print_r($response);
echo "\n";

echo "remove friends: \n";
$response = $friend->remove($user, $friends);
print_r($response);
echo "\n";
