<?php
require __DIR__ . '/config.php';
use JMessage\IM\Report;

$report = new Report($jm);

# --------------------------------------------------------------------------
# V1

$user = 'user_0';
$response = $report->getMessagesV1(0, 100, '2015-11-17 10:10:10', '2017-12-17 10:10:10');
print_r($response);

$response = $report->getUserMessagesV1($user, 0, 100);
print_r($response);


# --------------------------------------------------------------------------
# V2

$response = $report->getMessages(100, '2017-12-10 10:10:10', '2017-12-17 10:10:10');
print_r($response);

// $cursor = $response['body']['cursor'];
// $response = $report->getNextMessages($cursor);
// print_r($response);

$response = $report->getUserMessages($user, 100, '2017-12-10 10:10:10', '2017-12-17 10:10:10');
print_r($response);

// $cursor = $response['body']['cursor'];
// $response = $report->getNextUserMessages($user, $cursor);
// print_r($response);

$gid = 'VALID_GID';

$response = $report->getGroupMessages($gid, 100, '2017-12-10 10:10:10', '2017-12-17 10:10:10');
print_r($response);

// $cursor = $response['body']['cursor'];
// $response = $report->getNextGroupMessages($gid, $cursor);
// print_r($response);

$response = $report->messages('DAY', 2017-12-01, 6);
print_r($response);

$response = $report->users('DAY', 2017-12-01, 6);
print_r($response);

$response = $report->groups('DAY', 2017-12-01, 6);
print_r($response);
