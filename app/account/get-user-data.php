<?php
session_start();

header('Content-Type: application/json');

require "../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "GET") {    
    try {
        $stmt = $pdo->prepare("SELECT name, surname, phone_number, email_address FROM users WHERE user_id = :userId");
        $stmt->bindParam(':userId', $_SESSION["user_id"]);
        $stmt->execute();
        $userData = $stmt->fetch();

        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "User's data recieved successfully", "userData" => $userData]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['status' => 'fail', 'message' => 'Operation failed']);
    }
    exit;
}