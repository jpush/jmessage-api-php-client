<?php

require __DIR__ . '/../config.php';

use JMessage\IM\User;

$user = new User($jm);
$username = 'user_0';

echo "get users list: \n";
$response = $user->list(0, 100);
print_r($response);
echo "\n";

echo "get user info: \n";
$response = $user->show($username);
print_r($response);
echo "\n";

echo "update user info: \n";
$response = $user->update($username, ['nickname' => 'user_nickname_0', 'gender' => 2]);
print_r($response);
echo "\n";

echo "get user stat: \n";
$response = $user->stat($username);
print_r($response);
echo "\n";

echo "change user password: \n";
$response = $user->updatePassword($username, 'password_0');
print_r($response);
echo "\n";

// echo "delete user: \n";
// $response = $user->delete('user_10');
// print_r($response);
// echo "\n";


