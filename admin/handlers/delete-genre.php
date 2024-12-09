<?php
header('Content-Type: application/json');

require "../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "DELETE") {
    $genreId = isset($_GET['id']) ? $_GET['id'] : null;
    $requestData = json_decode(file_get_contents("php://input"), true);

    if($requestData["genreType"] === "ebook") {
        $deleteGenreSql = "DELETE FROM ebooks_genres WHERE genre_id = :genreId";
        $deleteAddedGenreSql = "DELETE FROM added_ebooks_genres WHERE genre_id = :genreId";
    } elseif($requestData["genreType"] === "pbook") {
        $deleteGenreSql = "DELETE FROM pbooks_genres WHERE genre_id = :genreId";
        $deleteAddedGenreSql = "DELETE FROM added_pbooks_genres WHERE genre_id = :genreId";
    }

    if($genreId) {
        try {
            $pdo->beginTransaction();

            $stmt1 = $pdo->prepare($deleteAddedGenreSql);
            $stmt1->bindParam(":genreId", $genreId, PDO::PARAM_INT);
            $stmt1->execute();

            $stmt2 = $pdo->prepare($deleteGenreSql);
            $stmt2->bindParam(":genreId", $genreId, PDO::PARAM_INT);
            $stmt2->execute();

            $pdo->commit();
    
            http_response_code(200);
            echo json_encode(["status" => "success", "message" => "Genre deleted successfully"]);
        } catch(PDOException $e) {
            $pdo->rollBack();

            http_response_code(500);
            echo json_encode(["status" => "fail", "message" => "Operation failed"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid genre ID"]);
    }
    exit;
}