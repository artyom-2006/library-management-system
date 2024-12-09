<?php
header('Content-Type: application/json');

require "../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "PATCH") {
    $changedData = json_decode(file_get_contents("php://input"), true);
    $userId = $_GET["id"];

    try {
        $stmt = $pdo->prepare("UPDATE users SET name = :name, surname = :surname, phone_number = :phone, email_address = :email WHERE user_id = :userId");
        $stmt->bindParam(':name', $changedData["name"]);
        $stmt->bindParam(':surname', $changedData["surname"]);
        $stmt->bindParam(':phone', $changedData["phone"]);
        $stmt->bindParam(':email', $changedData["email"]);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "User's data updated successfully"]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    }
}
exit;