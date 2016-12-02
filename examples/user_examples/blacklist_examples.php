<?php

require __DIR__ . '/../config.php';

use JMessage\User;

$user = new User($jm);
$username = 'user_0';

echo "add blacklist: \n";
$response = $user->addBlacklist($username, ['user_1']);
print_r($response);
echo "\n";

echo "get blacklists: \n";
$response = $user->blacklists($username);
print_r($response);
echo "\n";

echo "remove blacklist: \n";
$response = $user->removeBlacklist($username, ['user_1']);
print_r($response);
echo "\n";

echo "get blacklists: \n";
$response = $user->blacklists($username);
print_r($response);
echo "\n";
