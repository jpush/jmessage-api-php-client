<?php
require __DIR__ . '/../config.php';
use JMessage\IM\User;

$user = new User($jm);

$users = [
    ['username' => 'user_0', 'password' => 'password'],
    ['username' => 'user_1', 'password' => 'password'],
    ['username' => 'user_2', 'password' => 'password'],
    ['username' => 'user_3', 'password' => 'password'],
    ['username' => 'user_4', 'password' => 'password'],
    ['username' => 'user_5', 'password' => 'password'],
    ['username' => 'user_6', 'password' => 'password'],
    ['username' => 'user_7', 'password' => 'password'],
    ['username' => 'user_8', 'password' => 'password'],
    ['username' => 'user_9', 'password' => 'password'],
    ['username' => 'user_10', 'password' => 'password']
];

$response = $user->patchRegister($users);
print_r($response);

$username = 'username_20';
$password = 'password';
$response = $user->register($username, $password);
print_r($response);
