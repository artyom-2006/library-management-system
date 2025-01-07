<?php
header('Content-Type: application/json');

require "../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $userId = $_GET["id"];

    if($userId) {
        try {
            $pdo->beginTransaction();
/*
            // Delete all saved ebooks that has been saved by that user
            $stmt1 = $pdo->prepare("DELETE FROM saved_ebooks WHERE user_id = :userId");
            $stmt1->bindParam(":userId", $userId);
            $stmt1->execute();
*/
            // Delete user
            $stmt2 = $pdo->prepare("DELETE FROM users WHERE user_id = :userId");
            $stmt2->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt2->execute();

            $pdo->commit();

            echo json_encode(["status" => "success", "message" => "User deleted successfully"]);
        } catch (PDOException $e) {
            $pdo->rollBack();

            echo json_encode(["status" => "fail", "message" => "Operation failed", ''=>$e]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid user ID"]);
    }
    exit;
}