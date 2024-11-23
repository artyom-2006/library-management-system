<?php

require "../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    try {
        $stmt = $pdo->prepare("SELECT user_id, name, surname, phone_number, email_address, registration_date FROM users");
        $stmt->execute();
        $usersData = $stmt->fetchAll();
        http_response_code(200);
        $response = [
            'status' => "success",
            'usersData' => $usersData
        ];
    } catch (PDOException $e) {
        http_response_code(500);
        $response = [
            'status' => "fail",
            'message' => "Operation failed"
        ];
    }
}

header('Content-Type: application/json');
echo json_encode($response);
exit;