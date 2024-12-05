<?php
header("Content-Type: application/json");

require "../../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $genreData = json_decode(file_get_contents("php://input"), true);

    try {
        $stmt = $pdo->prepare("INSERT INTO ebooks_genres (genre_name) VALUES (:genreName)");
        $stmt->bindParam(':genreName', $genreData["name"]);
        $stmt->execute();

        http_response_code(201);
        echo json_encode(["status" => "success", "message" => "Ebook genre added successfully"]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    }
}
exit;