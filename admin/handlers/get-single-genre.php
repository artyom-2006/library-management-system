<?php
header('Content-Type: application/json');

require "../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    $genreId = $_GET["id"];
    $genreType = $_GET["type"];
    
    if($genreType === "ebook") {
        $sql = "SELECT genre_name FROM ebooks_genres WHERE genre_id = :genreId";
    } elseif($genreType === "pbook") {
        $sql = "SELECT genre_name FROM pbooks_genres WHERE genre_id = :genreId";
    }

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":genreId", $genreId);
        $stmt->execute();
        $genreData = $stmt->fetch();

        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "Genre's data recieved successfully", "genreData" => $genreData]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    }
    exit;
}