<?php
session_start();

header('Content-Type: application/json');

require "../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    if(isset($_COOKIE["rememberMeToken"])) {
        try {
            $stmt = $pdo->prepare("DELETE FROM remember_me_tokens WHERE user_id = :userId");
            $stmt->bindParam(":userId", $_SESSION["user_id"]);
            $stmt->execute();
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(["status" => "fail", "message" => "Operation failed"]);
            exit;
        }

        setcookie("rememberMeToken", "", time() - 3600, "/");
    }

    session_unset();
    session_destroy();

    http_response_code(200);
    echo json_encode(["status" => "success", "message" => "User logged out successfully"]);
    exit;
}