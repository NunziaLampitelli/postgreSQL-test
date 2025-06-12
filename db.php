<?php
$host = 'localhost';
$port = '5432'; 
$dbname = 'postgres';
$user = 'postgres';
$password = 'nunzia';

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection error: " . $e->getMessage();
    exit;
}