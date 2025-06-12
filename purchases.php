<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <title>Users shopping</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<?php
require 'db.php'; 

try {
    $sql = "SELECT * FROM purchase_details ORDER BY purchase_date DESC";
    $stmt = $pdo->query($sql);

    if ($stmt->rowCount() === 0) {
        echo "No purchase found";
    } else {
        echo "<h2>Users shopping list</h2>";

        echo '<table class="purchase-table">';
        echo '<thead><tr><th>User</th><th>Product</th><th>Purchase Date</th></tr></thead><tbody>';

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['user_name']) . '</td>';
            echo '<td>' . htmlspecialchars($row['product_name']) . '</td>';
            echo '<td><time>' . htmlspecialchars($row['purchase_date']) . '</time></td>';
            echo '</tr>';
        }

        echo '</tbody></table>';
    }

} catch (PDOException $e) {
    echo "Query error: " . $e->getMessage();
}
?>

</body>
</html>