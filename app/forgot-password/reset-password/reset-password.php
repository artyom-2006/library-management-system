<?php
session_start();

require "../../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION["password_haven't_changed"])) {
    $data = json_decode(file_get_contents("php://input"), true);
    $newPassword = htmlspecialchars($data["password"]);
    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT, ['cost' => 12]);

    try {
        $stmt = $pdo->prepare("UPDATE users SET password = :newPassword WHERE user_id = :user_id");
        $stmt->bindParam(':newPassword', $hashedPassword);
        $stmt->bindParam(':user_id', $_SESSION["user_id"]);
        $success = $stmt->execute();

        if($success) {
            unset($_SESSION["password_haven't_changed"]);

            http_response_code(200);
            $response = [
                'status' => 'success',
                'message' => 'Password updated successfully'
            ];
        } else {
            http_response_code(500);
            $response = [
                'status' => 'fail',
                'message' => 'Operation failed'
            ];
        }
    } catch (PDOException $e) {
        http_response_code(500);
        $response = [
            'status' => 'fail',
            'message' => 'Operation failed'
        ];
    }
} else {
    http_response_code(409);
    $response = [
        'status' => 'error',
        'message' => 'Password already changed'
    ];
}

header('Content-Type: application/json');
echo json_encode($response);
exit;