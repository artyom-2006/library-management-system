<?php
header('Content-Type: application/json');

require "../../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "DELETE") {
    $ebookId = isset($_GET['id']) ? $_GET['id'] : null;

    if($ebookId) {
        try {
            $pdo->beginTransaction();

            $stmt1 = $pdo->prepare("SELECT pdf_file_path, cover_image_path FROM ebooks WHERE ebook_id = :ebookId");
            $stmt1->bindParam(':ebookId', $ebookId);
            $stmt1->execute();
            $paths = $stmt1->fetch();

            if($paths) {
                if(file_exists($_SERVER["DOCUMENT_ROOT"] . $paths["pdf_file_path"])) {
                    unlink($_SERVER["DOCUMENT_ROOT"] . $paths["pdf_file_path"]);
                }

                if(file_exists($_SERVER["DOCUMENT_ROOT"] . $paths["cover_image_path"])) {
                    unlink($_SERVER["DOCUMENT_ROOT"] . $paths["cover_image_path"]);
                }
            }

            $stmt2 = $pdo->prepare("DELETE FROM saved_ebooks WHERE ebook_id = :ebookId");
            $stmt2->bindParam(':ebookId', $ebookId, PDO::PARAM_INT);
            $stmt2->execute();

            $stmt3 = $pdo->prepare("DELETE FROM added_ebooks_genres WHERE ebook_id = :ebookId");
            $stmt3->bindParam(':ebookId', $ebookId, PDO::PARAM_INT);
            $stmt3->execute();

            $stmt4 = $pdo->prepare("DELETE FROM ebooks WHERE ebook_id = :ebookId");
            $stmt4->bindParam(':ebookId', $ebookId, pdo::PARAM_INT);
            $stmt4->execute();

            $pdo->commit();

            http_response_code(200);
            echo json_encode(["status" => "success", "message" => "Ebook deleted successfully"]);
        } catch (PDOException $e) {
            $pdo->rollBack();

            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Invalid ebook ID"]);
        }
    } else {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Invalid ebook ID"]);
    }
}
exit;