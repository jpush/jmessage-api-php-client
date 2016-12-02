<?php

require 'config.php';

use JMessage\User;

$user = new User($jm);
$response = $user->getUser('username');

print_r($response);
