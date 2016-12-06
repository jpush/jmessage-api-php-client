<?php

require __DIR__ . '/../config.php';

use JMessage\IM\User;

$user = new User($jm);
$username = 'user_0';

echo "add single nodisturb: \n";
$response = $user->addSingleNodisturb($username, ['user_1']);
print_r($response);
echo "\n";

echo "remove single nodisturb: \n";
$response = $user->removeSingleNodisturb($username, ['user_1']);
print_r($response);
echo "\n";

echo "open global nodisturb: \n";
$response = $user->openGlobalNodisturb($username);
print_r($response);
echo "\n";

echo "close global nodisturb: \n";
$response = $user->closeGlobalNodisturb($username);
print_r($response);
echo "\n";

// 自定义免打扰的设置参数比较复杂，建议使用上面所述的 6 种方式设置免打扰。
// echo "custom nodisturb setting: \n";
// $touser = 'user';
// $user0 = 'user_0';
// $user1 = 'user_1';
// $user2 = 'user_2';
// $user3 = 'user_3';
// $gid0 = '10000';
// $gid1 = '10001';
// $gid2 = '10002';
// $gid3 = '10003';

// $options = [
//     "single" => [
//         "add"    => [$user0, $user1],
//         "remove" => [$user2, $user3],
//     ],
//     "group" => [
//         "add"    => [$gid0, $gid1],
//         "remove" => [$gid2, $gid3],
//     ],
//     "global" => 1
// ];

// $response = $user->nodisturb($touser, $options);
// print_r($response);
// echo "\n";
