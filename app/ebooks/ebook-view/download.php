<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$filepath = "../../.." . substr($data["filePath"], 8);

if(file_exists($filepath)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filepath));

    readfile($filepath);
} else {
    http_response_code(500);
    echo json_encode(["status" => "fail", "message" => "Operation failed"]);
}
exit;