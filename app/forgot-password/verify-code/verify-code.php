<?php
session_start();

require "../../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $otp = $data["otp"];

    if($otp === $_SESSION["otp"]) {
        unset($_SESSION["otp"]);
        http_response_code(200);
        $response = [
            'status' => 'success',
            'message' => 'OTP is correct'
        ];
    } else {
        http_response_code(401);
        $response = [
            'status' => 'error',
            'message' => 'Invalid OTP'
        ];
    }
}

header('Content-Type: application/json');
echo json_encode($response);
exit;