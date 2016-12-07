<?php
require __DIR__ . '/config.php';
use JMessage\Report;

$report = new Report($jm);

$response = $report->getMessages(0, 100);
print_r($response);

$response = $report->getUserMessages('user_0', 0, 100);
print_r($response);
