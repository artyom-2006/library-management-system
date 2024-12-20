<?php
session_start();
header('Content-Type: application/json');

require "../../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    $ebookId = $_GET["id"];

    try {
        // Getting all data of ebook from db
        $stmt = $pdo->prepare("SELECT * FROM ebooks WHERE ebook_id = :ebookId");
        $stmt->bindParam(":ebookId", $ebookId);
        $stmt->execute();
        $ebookData = $stmt->fetch();

        $formattedData = explode(" ", $ebookData["added_at"])[0];
        $formattedData = implode(".", array_reverse(explode("-", $formattedData)));
        $ebookData["added_at"] = $formattedData;

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
        } else {
            $ebookData["isSaved"] = false;
        }

        $_SESSION["ebookData"] = $ebookData;

        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "Ebook's data stored successfully"]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    }
    exit;
}