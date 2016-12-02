<?php

require __DIR__ . '/../config.php';

use JMessage\IM\Admin;

$admin = new Admin($jm);

$user = [
    'username' => 'admin',
    'password' => 'password'
];
$response = $admin->register($user);

print_r($response);
