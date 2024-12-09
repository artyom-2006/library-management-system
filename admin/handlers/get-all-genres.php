<?php
header('Content-Type: application/json');

require "../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    $genreType = $_GET["type"];
    $sql = ($genreType === "ebook") ? "SELECT genre_id, genre_name FROM ebooks_genres" : "SELECT genre_id, genre_name FROM pbooks_genres";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $genresData = $stmt->fetchAll();

        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "Genres data recieved successfully", "genresData" => $genresData]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    }
    exit;
}