<?php
header("Content-Type: application/json");

require "../../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $imageName = uniqid() . "_" . basename($_FILES["image"]["name"]);

    $postData = [
        "title" => $_POST["title"],
        "description" => $_POST["description"],
        "imageSize" => $_POST["imageSize"],
        "imagePath" => "/Library/uploads/blog/images/" . $imageName
    ];

    if(isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $targetImagePath = "../../../uploads/blog/images/" . $imageName;
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetImagePath);
    } else {
        http_response_code(401);
        echo json_encode(["status" => "error", "message" => "Post image not found"]);
        exit;
    }

    try {
        // Inserting post in database
        $stmt = $pdo->prepare("INSERT INTO blog_posts (title, description, imagePath) VALUES (:title, :description, :imagePath)");
        $stmt->bindParam(':title', $postData["title"]);
        $stmt->bindParam(':description', $postData["description"]);
        $stmt->bindParam(':imagePath', $postData["imagePath"]);
        $stmt->execute();

        http_response_code(201);
        echo json_encode(["status" => "success", "message" => "Post added successfully"]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    }
    exit;
}