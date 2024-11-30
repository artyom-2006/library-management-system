<?php
session_start();
header("Content-Type: application/json");

require "../../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $userId = $_SESSION["user_id"];
    $ebookId = $_GET["id"];

    try {
        $stmt = $pdo->prepare("DELETE FROM saved_ebooks WHERE user_id = :userId AND ebook_id = :ebookId");
        $stmt->bindParam(":userId", $userId);
        $stmt->bindParam(":ebookId", $ebookId);
        $stmt->execute();
        
        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "Ebook unsaved successfully"]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    }
    exit;
}