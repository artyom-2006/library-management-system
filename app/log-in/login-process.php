<?php
session_start();

require "../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $email = @$data["email"];
    $password = @$data["password"];
    
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email_address = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch();

        if($user) {
            if(password_verify($password, $user["password"])) {
                $_SESSION["user_id"] = $user["user_id"];
        
                http_response_code(200);
                $response = [
                    "status" => "success",
                    "message" => "Login successful"
                ];
            } else {
                http_response_code(401);
                $response = [
                    "status" => "error",
                    "message" => "Invalid password"
                ];
            }
        } else {
            http_response_code(401);
            $response = [
                "status" => "error",
                "message" => "Invalid email"
            ];
        }
    } catch (PDOException $e) {
        http_response_code(500);
        $response = [
            "status" => "fail",
            "message" => "Operation failed"
        ];
    }
}

header('Content-Type: application/json');
echo json_encode($response);
exit;