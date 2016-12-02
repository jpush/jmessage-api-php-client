<?php

require __DIR__ . '/../config.php';

use JMessage\IM\User;

$user = new User($jm);
$username = 'user_0';

echo "get users list: \n";
$response = $user->getUsers();
print_r($response);
echo "\n";

echo "get user info: \n";
$response = $user->getUser($username);
print_r($response);
echo "\n";

echo "update user info: \n";
$response = $user->updateUser($username, ['nickname' => 'user_nickname_0']);
print_r($response);
echo "\n";

echo "get user stat: \n";
$response = $user->userStat($username);
print_r($response);
echo "\n";

echo "change user password: \n";
$response = $user->changePassword($username, 'password_0');
print_r($response);
echo "\n";

// echo "delete user: \n";
// $response = $user->deleteUser('user_10');
// print_r($response);
// echo "\n";


