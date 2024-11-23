<?php
header('Content-Type: application/json');

require "../../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    $ebookId = $_GET["id"];
    
    try {
        $stmt = $pdo->prepare("SELECT name, author, edges, language, size, description FROM ebooks WHERE ebook_id = :ebookId");
        $stmt->bindParam(':ebookId', $ebookId);
        $stmt->execute();
        $ebookData = $stmt->fetch();

        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "Ebook's data recieved successfully", "ebookData" => $ebookData]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    }
    exit;
}