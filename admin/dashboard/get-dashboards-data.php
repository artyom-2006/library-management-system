<?php
header('Content-Type: application/json');

require "../../includes/connect.inc.php";

try {
    $counts = [];
    $sql = "SELECT 'users' AS table_name, COUNT(*) AS count FROM users UNION ALL SELECT 'ebooks' AS table_name, COUNT(*) AS count FROM ebooks";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    while($row = $stmt->fetch()) {
        $counts[$row['table_name']] = $row['count'];
    }
    
    http_response_code(200);
    echo json_encode(["status" => "success", "quantities" => $counts]);
    exit;
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    exit;
}