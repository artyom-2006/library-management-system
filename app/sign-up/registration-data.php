<?php

require "../../includes/connect.inc.php";
require "../../includes/registration-login-functions.inc.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $name = htmlspecialchars($data['name']);
    $surname = htmlspecialchars($data['surname']);
    $phone = htmlspecialchars($data['phone']);
    $email = htmlspecialchars($data['email']);
    $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT, ['cost' => 12]);

    try {
        // Checking if email already used or not
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email_address = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $emailExists = $stmt->fetchColumn() > 0;

        // Checking if phone number already used or not
        $stmt = $pdo->prepare("SELECT phone_number FROM users");
        $stmt->execute();
        $phoneNumbersDB = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $phoneExists = false;

        for($i = 0; $i < count($phoneNumbersDB); $i++) {
            if(normalizeAndComparePhones($phone, $phoneNumbersDB[$i])) {
                $phoneExists = true;
                break;
            }
        }

        if($emailExists) {
            http_response_code(409);
            $response = [
                'status' => 'error',
                'message' => 'Email already exists'
            ];
        } elseif($phoneExists) {
            http_response_code(409);
            $response = [
                'status' => 'error',
                'message' => 'Phone number already exists'
            ];
        } else {
            $stmt = $pdo->prepare("INSERT INTO `users`(name, surname, phone_number, email_address, password) VALUES (:name, :surname, :phone, :email, :password)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':surname', $surname);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->execute();
        
            http_response_code(201);
            $response = [
                'status' => 'success',
                'message' => 'User registered successfully'
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