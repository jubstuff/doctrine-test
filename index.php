<?php

require_once __DIR__ . '/vendor/autoload.php';

$connectionParams = require_once __DIR__ . '/connection_params.php';

$config = new \Doctrine\DBAL\Configuration();
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

echo "Connection OK";
