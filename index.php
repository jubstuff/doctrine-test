<?php

require_once __DIR__ . '/vendor/autoload.php';

$connectionParams = require_once __DIR__ . '/connection_params.php';

$config = new \Doctrine\DBAL\Configuration();
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

// simple query
$sql = "SELECT * FROM actor";
$stmt = $conn->query($sql);

// query with positional placeholder
$sql = "SELECT * FROM actor WHERE actor_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bindValue(1, 10);
$stmt->execute();

// query with named placeholder
$sql = "SELECT * FROM actor WHERE actor_id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindValue('id', 9);
$stmt->execute();

// query with a parameters list
$sql = "SELECT * FROM actor WHERE actor_id IN (?)";
$stmt = $conn->executeQuery(
    $sql,
    array(array(1, 2, 4, 6, 7, 9)),
    array(\Doctrine\DBAL\Connection::PARAM_INT_ARRAY)
);

