<?php
session_start();

header("Content-Type: application/json");

$_SESSION["admin_logged_in"] = false;

http_response_code(200);
echo json_encode(["status" => "success"]);
exit;