<?php
session_start();
header('Content-Type: application/json');

require "../../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    $userId = $_SESSION["user_id"];

    try {
        // Getting all ebooks data
        $sql = "
            SELECT ebooks.*, saved_ebooks.user_id
            FROM ebooks
            INNER JOIN saved_ebooks
            ON ebooks.ebook_id = saved_ebooks.ebook_id
            WHERE saved_ebooks.user_id = :userId
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":userId", $userId);
        $stmt->execute();
        $ebooksData = $stmt->fetchAll();

        $ebooksData = array_map(function($ebook) {
            $formattedData = explode(" ", $ebook["added_at"])[0];
            $formattedData = implode(".", array_reverse(explode("-", $formattedData)));
            $ebook["added_at"] = $formattedData;
            
            return $ebook;
        }, $ebooksData);

        http_response_code(200);
        if(empty($ebooksData)) {
            echo json_encode(["status" => "fail", "message" => "No ebooks found"]);
            exit;
        }
        echo json_encode(["status" => "success", "ebooksData" => $ebooksData]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    }
    exit;
}