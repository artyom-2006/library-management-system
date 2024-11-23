<?php
header('Content-Type: application/json');

require "../../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "DELETE") {
    $ebookId = isset($_GET['id']) ? $_GET['id'] : null;

    if($ebookId) {
        $stmt = $pdo->prepare("SELECT pdf_file_path, cover_image_path FROM ebooks WHERE ebook_id = :ebookId");
        $stmt->bindParam(':ebookId', $ebookId);
        $stmt->execute();
        $paths = $stmt->fetch();

        if($paths) {
            if(file_exists($_SERVER["DOCUMENT_ROOT"] . $paths["pdf_file_path"])) {
                unlink($_SERVER["DOCUMENT_ROOT"] . $paths["pdf_file_path"]);
            }

            if(file_exists($_SERVER["DOCUMENT_ROOT"] . $paths["cover_image_path"])) {
                unlink($_SERVER["DOCUMENT_ROOT"] . $paths["cover_image_path"]);
            }
        }

        $stmt = $pdo->prepare("DELETE FROM ebooks WHERE ebook_id = :ebookId");
        $stmt->bindParam(':ebookId', $ebookId);
        $stmt->execute();

        echo json_encode(["status" => "success", "message" => "Ebook deleted successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid ebook ID"]);
    }
    exit;
}