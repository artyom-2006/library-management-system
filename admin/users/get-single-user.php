<?php

require "../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    
    try {
        $stmt = $pdo->prepare("SELECT name, surname, phone_number, email_address FROM users WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $data["id"]);
        $stmt->execute();
        $userData = $stmt->fetch();

        http_response_code(200);
        $response = [
            "status" => "success",
            "message" => "User's data recieved successfully",
            "userData" => $userData
        ];
    } catch (PDOException $e) {
        http_response_code(500);
        $response = [
            'status' => 'fail',
            'message' => 'Operation failed'
        ];
    }
}

header('Content-Type: application/json');
echo json_encode($response);
exit;