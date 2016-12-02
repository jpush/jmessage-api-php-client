<?php

require __DIR__ . '/../config.php';

use JMessage\Admin;

$admin = new Admin($jm);

$user = [
    'username' => 'admin',
    'password' => 'password'
];
$response = $admin->register($user);

print_r($response);
