<?php
header('Content-Type: application/json');

require "../../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "PATCH") {
    $changedData = json_decode(file_get_contents("php://input"), true);
    $ebookId = $_GET["id"];

    try {
        $stmt = $pdo->prepare("UPDATE ebooks SET name = :name, author = :author, edges = :edges, language = :language, description = :description WHERE ebook_id = :ebookId");
        $stmt->bindParam(':name', $changedData["name"]);
        $stmt->bindParam(':author', $changedData["author"]);
        $stmt->bindParam(':edges', $changedData["edges"]);
        $stmt->bindParam(':language', $changedData["language"]);
        $stmt->bindParam(':description', $changedData["description"]);
        $stmt->bindParam(':ebookId', $ebookId);
        $stmt->execute();

        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "Ebook's data updated successfully"]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    }
    exit;
}