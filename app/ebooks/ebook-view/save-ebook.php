<?php
session_start();
header("Content-Type: application/json");

require "../../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $userId = $_SESSION["user_id"];
    $ebookId = $_GET["id"];

    try {
        $stmt = $pdo->prepare("INSERT INTO saved_ebooks (user_id, ebook_id) VALUES (:user_id, :ebook_id)");
        $stmt->bindParam(":user_id", $userId);
        $stmt->bindParam(":ebook_id", $ebookId);
        $stmt->execute();
        
        http_response_code(201);
        echo json_encode(["status" => "success", "message" => "Ebook saved successfully"]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    }
    exit;
}