<?php
require 'db.php';

try {
    $stmt = $pdo->query("SELECT id, name FROM products ORDER BY name");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($products);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error fetching products']);
}
