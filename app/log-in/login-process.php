<?php
session_start();
date_default_timezone_set("Asia/Yerevan");

header('Content-Type: application/json');

require "../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $email = $data["email"];
    $password = $data["password"];
    $rememberMe = $data["rememberMe"];
    
    try {
        $pdo->beginTransaction();

        $stmt1 = $pdo->prepare("SELECT * FROM users WHERE email_address = :email");
        $stmt1->bindParam(':email', $email);
        $stmt1->execute();
        $userData = $stmt1->fetch();

        if($userData) {
            if(password_verify($password, $userData["password"])) {
                $_SESSION["user_id"] = $userData["user_id"];
        
                // Setting remember me token if it's needed
                if($rememberMe) {
                    $token = bin2hex(random_bytes(32)); // Generate a secure token
                    $hashedToken = hash('sha256', $token); // Hash the token for storage
                    $expiresAt = date('Y-m-d H:i:s', strtotime('+30 days')); // Date for token active time, token will be active for 30 days

                    $stmt2 = $pdo->prepare("INSERT INTO remember_me_tokens (user_id, token, expires_at) VALUES (:userId, :token, :expiresAt)");
                    $stmt2->bindParam(":userId", $userData["user_id"]);
                    $stmt2->bindParam(":token", $hashedToken);
                    $stmt2->bindParam(":expiresAt", $expiresAt);
                    $stmt2->execute();

                    setcookie("rememberMeToken", $hashedToken, time() + (86400 * 30), "/", "", true, true);
                }

                http_response_code(200);
                echo json_encode(["status" => "success", "message" => "Login successful"]);
            } else {
                http_response_code(401);
                echo json_encode(["status" => "error", "message" => "Invalid password"]);
            }
        } else {
            http_response_code(401);
            echo json_encode(["status" => "error", "message" => "Invalid email"]);
        }

        $pdo->commit();
    } catch (PDOException $e) {
        $pdo->rollBack();

        http_response_code(500);
        echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    }
    exit;
}