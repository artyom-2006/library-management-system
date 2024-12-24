<?php
session_start();

header('Content-Type: application/json');

if($_SERVER["REQUEST_METHOD"] === "GET") {
    http_response_code(200);
    echo json_encode(["status" => "success", "postData" => $_SESSION["postData"]]);
    exit;        
}