<?php
require 'db.php'; 

try {
    $sql = "SELECT * FROM users";
    $stmt = $pdo->query($sql);

    // maps results
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: " . htmlspecialchars($row['id']) . " - Name: " . htmlspecialchars($row['name']) . " - Email: " . htmlspecialchars($row['email']) . "<br>";
    }

} catch (PDOException $e) {
    echo "Errore nella query: " . $e->getMessage();
}
