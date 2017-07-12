<?php
require __DIR__ . '/config.php';
use JMessage\IM\Group;

$group = new Group($jm);

$owner = 'user_0';
$name = 'jiguang';
// $members = ['user_1', 'user_2', 'user_3'];
$members = [];
$mems = ['user_4', 'user_5'];
$desc = 'jiguang gtoup';

echo "create group: \n";
$response = $group->create($owner, $name, $desc, $members);
print_r($response);
echo "\n";

$gid = $response['body']['gid'];

echo "show group: \n";
$response = $group->show($gid);
print_r($response);
echo "\n";

echo "update group: \n";
$name = 'new jiguang';
$desc = 'new jiguang gtoup';
$response = $group->update($gid, $name, $desc);
print_r($response);
echo "\n";

echo "group list: \n";
$response = $group->listAll(10);
print_r($response);
echo "\n";

#### members start

echo "list members in group: \n";
$response = $group->members($gid);
print_r($response);
echo "\n";

echo "add members to group: \n";
$response = $group->addMembers($gid, $mems);
print_r($response);
echo "\n";

echo "list members in group: \n";
$response = $group->members($gid);
print_r($response);
echo "\n";

echo "remove members from group: \n";
$response = $group->removeMembers($gid, $mems);
print_r($response);
echo "\n";

echo "list members in group: \n";
$response = $group->members($gid);
print_r($response);
echo "\n";

#### members end
echo "delete group: \n";
$response = $group->delete($gid);
print_r($response);
echo "\n";
