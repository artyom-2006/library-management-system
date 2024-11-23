<?php
header('Content-Type: application/json');

require "../../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    try {
        $stmt = $pdo->prepare("SELECT ebook_id, name, author, cover_image_path FROM ebooks");
        $stmt->execute();
        $ebooksData = $stmt->fetchAll();

        http_response_code(200);
        if(empty($ebooksData)) {
            echo json_encode(["status" => "fail", "message" => "No ebooks found"]);
            exit;
        }
        echo json_encode(["status" => "success", "ebooksData" => $ebooksData]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    }
    exit;
}