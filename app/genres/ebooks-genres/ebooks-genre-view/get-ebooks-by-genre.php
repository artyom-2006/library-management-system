<?php
session_start();
header('Content-Type: application/json');

if($_SERVER["REQUEST_METHOD"] === "GET") {
    if(isset($_SESSION["ebooksGenreName"]) && isset($_SESSION["genreEbooksData"])) {
        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "All ebooks data by genre received successfully", "genreName" => $_SESSION["ebooksGenreName"], "ebooksDataByGenre" => $_SESSION["genreEbooksData"]]);
    } else {
        http_response_code(500);
        echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    }
}
exit;