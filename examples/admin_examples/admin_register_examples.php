<?php
require __DIR__ . '/../config.php';
use JMessage\IM\Admin;

$admin = new Admin($jm);

$info = [
    'username' => 'admin',
    'password' => 'password'
];

$response = $admin->register($info);

print_r($response);
