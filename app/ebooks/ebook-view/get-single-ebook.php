<?php
session_start();
header('Content-Type: application/json');

require "../../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    $ebookId = $_SESSION["ebookData"]["ebook_id"];

    try {
        $pdo->beginTransaction();

        // Getting all data of ebook from db
        $stmt1 = $pdo->prepare("SELECT * FROM ebooks WHERE ebook_id = :ebookId");
        $stmt1->bindParam(":ebookId", $ebookId);
        $stmt1->execute();
        $ebookData = $stmt1->fetch();

        $formattedData = explode(" ", $ebookData["added_at"])[0];
        $formattedData = implode(".", array_reverse(explode("-", $formattedData)));
        $ebookData["added_at"] = $formattedData;
        $ebookData["isUserLoggedIn"] = isset($_SESSION["user_id"]);

        // Getting added genres for the ebook
        $sql = "
            SELECT ebooks_genres.genre_id, ebooks_genres.genre_name
            FROM ebooks_genres
            JOIN added_ebooks_genres ON ebooks_genres.genre_id = added_ebooks_genres.genre_id
            WHERE added_ebooks_genres.ebook_id = :ebookId
        ";
        $stmt2 = $pdo->prepare($sql);
        $stmt2->bindParam(":ebookId", $ebookId);
        $stmt2->execute();
        $ebookData["genres"] = $stmt2->fetchAll();

        // Checkinf if ebook is saved or not
        if(isset($_SESSION["user_id"])) {
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM saved_ebooks WHERE user_id = :userId AND ebook_id = :ebookId");
            $stmt->bindParam(':userId', $_SESSION["user_id"], PDO::PARAM_INT);
            $stmt->bindParam(':ebookId', $ebookId, PDO::PARAM_INT);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            
            if($count > 0) {
                $ebookData["isSaved"] = true;
            } else {
                $ebookData["isSaved"] = false;
            }
        }

        $pdo->commit();

        $_SESSION["ebookData"] = $ebookData;

        http_response_code(200);
        echo json_encode(["status" => "success", "ebookData" => $_SESSION["ebookData"]]);
    } catch (PDOException $e) {
        $pdo->rollBack();

        http_response_code(500);
        echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    }
    exit;
}