<?php
header('Content-Type: application/json');

require "../../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    try {
        $stmt = $pdo->prepare("SELECT genre_id, genre_name, created_at FROM ebooks_genres");
        $stmt->execute();
        $genresData = $stmt->fetchAll();
    
        http_response_code(200);
        echo json_encode(["status" => "success", "genresData" => $genresData]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    }
}
exit;