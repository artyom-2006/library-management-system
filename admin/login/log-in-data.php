<?php
session_start();

require "../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $loginData = json_decode(file_get_contents("php://input"), true);
    $username = htmlspecialchars($loginData["username"]);
    $password = htmlspecialchars($loginData["password"]);

    try {
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $admin = $stmt->fetch();

        if($admin && password_verify($password, $admin["password"])) {
            $_SESSION["admin_logged_in"] = true;

            http_response_code(200);
            $response = [
                'status' => "success",
                'message' => "Valid data"
            ];
        } else {
            http_response_code(401);
            $response = [
                'status' => "error",
                'message' => "Invalid data"
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