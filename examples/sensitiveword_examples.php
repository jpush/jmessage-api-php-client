<?php
require __DIR__ . '/config.php';
use JMessage\IM\SensitiveWord;

$sensitiveword = new SensitiveWord($jm);

$word_0 = 'fuck';
$word_1 = 'shit';
$word_2 = 'damn';

echo "list sensitiveword: \n";
$response = $sensitiveword->listAll(0, 10);
print_r($response['body']);
echo "\n";

echo "add sensitiveword: $word_0 and $word_1 \n";
$response = $sensitiveword->add([$word_0, $word_1]);
print_r($response['body']);
echo "\n";

echo "list sensitiveword: \n";
$response = $sensitiveword->listAll(0, 10);
print_r($response['body']);
echo "\n";

echo "update sensitiveword: $word_0 => $word_2 \n";
$response = $sensitiveword->update($word_0, $word_2);
print_r($response['body']);
echo "\n";

echo "list sensitiveword: \n";
$response = $sensitiveword->listAll(0, 10);
print_r($response['body']);
echo "\n";

echo "delete sensitiveword: $word_1 \n";
$response = $sensitiveword->delete($word_1);
print_r($response['body']);
echo "\n";

echo "list sensitiveword: \n";
$response = $sensitiveword->listAll(0, 10);
print_r($response['body']);
echo "\n";

echo "delete sensitiveword: $word_2 \n";
$response = $sensitiveword->delete($word_2);
print_r($response['body']);
echo "\n";

echo "list sensitiveword: \n";
$response = $sensitiveword->listAll(0, 10);
print_r($response['body']);
echo "\n";


echo "get sensitiveword status: \n";
$response = $sensitiveword->getStatus();
print_r($response['body']);
echo "\n";

echo "update sensitiveword status: \n";
$response = $sensitiveword->updateStatus(true);
print_r($response);
echo "\n";

echo "get sensitiveword status: \n";
$response = $sensitiveword->getStatus();
print_r($response['body']);
echo "\n";

echo "update sensitiveword status: \n";
$response = $sensitiveword->updateStatus(false);
print_r($response);
echo "\n";

echo "get sensitiveword status: \n";
$response = $sensitiveword->getStatus();
print_r($response['body']);
echo "\n";
