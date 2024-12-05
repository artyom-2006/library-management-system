<?php
header('Content-Type: application/json');

require "../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "PATCH") {
    $changedData = json_decode(file_get_contents("php://input"), true);
    $genreId = $_GET["id"];
    $genreType = $_GET["type"];

    if($genreType === "ebook") {
        $sql = "UPDATE ebooks_genres SET genre_name = :genreName WHERE genre_id = :genreId";
    } elseif($genreType === "pbook") {
        $sql = "UPDATE pbooks_genres SET genre_name = :genreName WHERE genre_id = :genreId";
    }

    try {
        $stmt = $pdo->prepare("UPDATE ebooks_genres SET genre_name = :genreName WHERE genre_id = :genreId");
        $stmt->bindParam(':genreName', $changedData["name"]);
        $stmt->bindParam(':genreId', $genreId);
        $stmt->execute();

        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "Genre's data updated successfully"]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    }
    exit;
}