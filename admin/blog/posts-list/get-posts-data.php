<?php
header('Content-Type: application/json');

require "../../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    try {
        $stmt = $pdo->prepare("SELECT post_id, title, description, created_at FROM blog_posts");
        $stmt->execute();
        $postsData = $stmt->fetchAll();
    
        if(empty($postsData)) {
            echo json_encode(["status" => "fail", "message" => "No posts found"]);
            exit;
        }
        http_response_code(200);
        echo json_encode(["status" => "success", "postsData" => $postsData]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    }
    exit;
}