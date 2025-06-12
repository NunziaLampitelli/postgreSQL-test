<?php
require 'db.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$userId = $data['user_id'] ?? null;
$productId = $data['product_id'] ?? null;

if (!$userId || !$productId) {
    http_response_code(400);
    echo json_encode(['message' => 'User or product not selected']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO purchases (user_id, product_id, purchase_date) VALUES (?, ?, NOW())");
    $stmt->execute([$userId, $productId]);

    echo json_encode(['message' => 'Purchase registered in the database!']);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['message' => 'Error during the upload']);
}
