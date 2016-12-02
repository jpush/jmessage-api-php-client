<?php

require __DIR__ . '/../config.php';

use JMessage\User;

$user = new User($jm);

$users = [
    ['username' => 'user_0', 'password' => 'password'],
    ['username' => 'user_1', 'password' => 'password']
];
$response = $user->register($users);

print_r($response);
