<?php
session_start();
header('Content-Type: application/json');

require "../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    $genreId = $_GET["id"];

    try {
        // Getting all data of ebooks by genre from db
        $pdo->beginTransaction();

        // Getting genre name from db
        $stmt1 = $pdo->prepare("SELECT genre_name FROM ebooks_genres WHERE genre_id = :genreId");
        $stmt1->bindParam(":genreId", $genreId);
        $stmt1->execute();
        $genreName = $stmt1->fetch();

        // Getting all ebooks data by genre
        $sql = "
            SELECT ebooks.*
            FROM ebooks
            INNER JOIN added_ebooks_genres
            ON ebooks.ebook_id = added_ebooks_genres.ebook_id
            WHERE added_ebooks_genres.genre_id = :genreId
        ";
        $stmt2 = $pdo->prepare($sql);
        $stmt2->bindParam(":genreId", $genreId);
        $stmt2->execute();
        $ebooksGenreData = $stmt2->fetchAll();

        // Storing data in session variables
        $_SESSION["ebooksGenreName"] = $genreName;
        $_SESSION["genreEbooksData"] = $ebooksGenreData;

        $pdo->commit();

        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "All ebooks received successfully by genre"]);
    } catch (PDOException $e) {
        $pdo->rollBack();

        http_response_code(500);
        echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    }
    exit;
}