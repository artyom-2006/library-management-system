<?php
header('Content-Type: application/json');

require "../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    try {
        // Getting all blog's posts data
        $stmt = $pdo->prepare("SELECT * FROM blog_posts");
        $stmt->execute();
        $postsData = $stmt->fetchAll();

        $postsData = array_map(function($post) {
            $formattedData = explode(" ", $post["created_at"])[0];
            $formattedData = implode(".", array_reverse(explode("-", $formattedData)));
            $post["created_at"] = $formattedData;
            
            return $post;
        }, $postsData);

        http_response_code(200);
        if(empty($postsData)) {
            echo json_encode(["status" => "fail", "message" => "No blog posts found"]);
            exit;
        }
        echo json_encode(["status" => "success", "postsData" => $postsData]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    }
    exit;
}