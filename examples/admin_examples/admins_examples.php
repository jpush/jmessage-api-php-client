<?php

require __DIR__ . '/../config.php';

use JMessage\Admin;

$admin = new Admin($jm);

$response = $admin->getAdmins();
print_r($response);

