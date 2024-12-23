<?php
session_start();

header('Content-Type: application/json');

require "../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "PATCH") {
    $changedUserData = json_decode(file_get_contents("php://input"), true);
    $userId = $_SESSION["user_id"];

    try {
        $stmt = $pdo->prepare("UPDATE users SET name = :name, surname = :surname, phone_number = :phone WHERE user_id = :userId");
        $stmt->bindParam(':name', $changedUserData["name"]);
        $stmt->bindParam(':surname', $changedUserData["surname"]);
        $stmt->bindParam(':phone', $changedUserData["phone"]);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "User's data updated successfully", "updatedUserData" => $changedUserData]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    }
    exit;
}