<?php
header('Content-Type: application/json');

require "../../includes/connect.inc.php";

$userId = $_GET["id"];

if($userId) {
    try {
        $stmt = $pdo->prepare("DELETE FROM users WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();

        echo json_encode(["status" => "success", "message" => "User deleted successfully"]);
    } catch (PDOException $e) {
        echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid user ID"]);
}
exit;