<?php
require __DIR__ . '/config.php';
use JMessage\IM\Resource;

$rescource = new Resource($jm);

$image = __DIR__ . '/jiguang.png';

echo "upload image: \n";
$response = $rescource->upload('image', $image);
print_r($response);
echo "\n";

echo "upload file: \n";
$response = $rescource->upload('file', $image);
print_r($response);
echo "\n";

$mediaId = $response['body']['media_id'];

echo "download file: \n";
$response = $rescource->download($mediaId);
print_r($response);
echo "\n";

