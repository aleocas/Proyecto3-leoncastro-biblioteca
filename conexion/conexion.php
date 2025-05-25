<?php

$host = 'localhost';
$dbname = 'proyecto3_biblioteca';
$username = 'root';
$password = '';

$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

try {
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

?>