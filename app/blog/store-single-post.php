<?php
session_start();
header('Content-Type: application/json');

require "../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    $postId = $_GET["id"];

    try {
        // Getting all data of post from db
        $stmt = $pdo->prepare("SELECT * FROM blog_posts WHERE post_id = :postId");
        $stmt->bindParam(":postId", $postId);
        $stmt->execute();
        $postData = $stmt->fetch();

        $formattedData = explode(" ", $postData["created_at"])[0];
        $formattedData = implode(".", array_reverse(explode("-", $formattedData)));
        $postData["created_at"] = $formattedData;

        $_SESSION["postData"] = $postData;

        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "Post's data stored successfully"]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    }
    exit;
}