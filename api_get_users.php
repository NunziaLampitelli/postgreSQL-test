<?php
require 'db.php';

try {
    $stmt = $pdo->query("SELECT id, name FROM users ORDER BY name");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($users);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error fetching users']);
}
