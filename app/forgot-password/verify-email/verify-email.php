<?php
session_start();

require "../../../includes/connect.inc.php";
require "./email-content.inc.php";
require "./phpmailer.inc.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $email = $data["email"];

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email_address = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch();

        if($user) {
            $_SESSION["user_id"] = $user["user_id"];
            $_SESSION["password_haven't_changed"] = true;
            $_SESSION["otp"] = $otp;
            $recipient = $user["email_address"];
            
            if(sendEmail($recipient, $subject, $body)) {
                http_response_code(200);
                $response = [
                    'status' => 'success',
                    'message' => 'The email has been sent'
                ];
            } else {
                http_response_code(500);
                $response = [
                    'status' => 'fail',
                    'message' => 'Operation failed'
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
            'status' => 'fail',
            'message' => 'Operation failed'
        ];
    }
}

header('Content-Type: application/json');
echo json_encode($response);
exit;