<?php

require __DIR__ . '/../config.php';

use JMessage\User;

$user = new User($jm);
$username = 'user_0';

$response = $user->addSingleNodisturb($username, ['user_1']);
print_r($response);

$response = $user->removeSingleNodisturb($username, ['user_1']);
print_r($response);


