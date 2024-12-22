<?php
session_start();

require "connect.inc.php";

if(!isset($_SESSION['user_id']) && isset($_COOKIE['rememberMeToken'])) {
    $cookieHashedToken = $_COOKIE['rememberMeToken'];
    //$hashedToken = hash('sha256', $token);
    
    $stmt = $pdo->prepare("SELECT user_id FROM remember_me_tokens WHERE token = :token AND expires_at > NOW()");
    $stmt->bindParam(":token", $cookieHashedToken, PDO::PARAM_STR);
    $stmt->execute();
    $userId = $stmt->fetchColumn();

    if($userId) {
        $_SESSION['user_id'] = $userId;
    }
}