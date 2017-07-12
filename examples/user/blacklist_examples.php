<?php
require __DIR__ . '/../config.php';
use JMessage\IM\Blacklist;

$blacklist = new Blacklist($jm);
$user = 'user_0';

echo "add blacklist: \n";
$response = $blacklist->add($user, ['user_1']);
print_r($response);
echo "\n";

echo "get blacklists: \n";
$response = $blacklist->listAll($user);
print_r($response);
echo "\n";

echo "remove blacklist: \n";
$response = $blacklist->remove($user, ['user_1']);
print_r($response);
echo "\n";

echo "get blacklists: \n";
$response = $blacklist->listAll($user);
print_r($response);
echo "\n";
