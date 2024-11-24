<?php
session_start();
header('Content-Type: application/json');

require "../../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    $ebookId = $_GET["id"];

    try {
        $stmt = $pdo->prepare("SELECT * FROM ebooks WHERE ebook_id = :ebookId");
        $stmt->bindParam(":ebookId", $ebookId);
        $stmt->execute();
        $ebookData = $stmt->fetch();

        $formattedData = explode(" ", $ebookData["added_at"])[0];
        $formattedData = implode(".", array_reverse(explode("-", $formattedData)));
        $ebookData["added_at"] = $formattedData;

        $_SESSION["ebookData"] = $ebookData;

        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "Ebook's data stored successfully."]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    }
    exit;
}