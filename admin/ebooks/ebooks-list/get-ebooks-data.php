<?php
header('Content-Type: application/json');

require "../../../includes/connect.inc.php";

try {
    $stmt = $pdo->prepare("SELECT ebook_id, name, author, edges, language, size, description, added_at FROM ebooks");
    $stmt->execute();
    $ebooksData = $stmt->fetchAll();

    if(empty($ebooksData)) {
        echo json_encode(["status" => "fail", "message" => "No ebooks found"]);
        exit;
    }
    http_response_code(200);
    echo json_encode(["status" => "success", "ebooksData" => $ebooksData]);
    exit;
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    exit;
}