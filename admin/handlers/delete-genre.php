<?php
header('Content-Type: application/json');

require "../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "DELETE") {
    $genreId = isset($_GET['id']) ? $_GET['id'] : null;
    $requestData = json_decode(file_get_contents("php://input"), true);

    if($requestData["genreType"] === "ebook") {
        $sql = "DELETE FROM ebooks_genres WHERE genre_id = :genreId";
    } elseif($requestData["genreType"] === "pbook") {
        $sql = "DELETE FROM pbooks_genres WHERE genre_id = :genreId";
    }

    if($genreId) {
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":genreId", $genreId);
            $stmt->execute();
    
            http_response_code(200);
            echo json_encode(["status" => "success", "message" => "Genre deleted successfully"]);
        } catch(PDOException $e) {
            http_response_code(500);
            echo json_encode(["status" => "fail", "message" => "Operation failed"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid genre ID"]);
    }
    exit;
}