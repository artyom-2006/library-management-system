<?php
header("Content-Type: application/json");

require "../../../includes/connect.inc.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $fileName = uniqid() . "_" . basename($_FILES["file"]["name"]);
    $coverName = uniqid() . "_" . basename($_FILES["cover"]["name"]);

    $eBookData = [
        "name" => $_POST["name"],
        "author" => $_POST["author"],
        "edges" => $_POST["edges"],
        "language" => $_POST["language"],
        "description" => $_POST["description"],
        "fileSize" => $_POST["fileSize"],
        "filePath" => "/Library/uploads/ebooks/files/" . $fileName,
        "coverPath" => "/Library/uploads/ebooks/covers/" . $coverName,
        "selectedGenres" => $_POST["selectedGenres"]
    ];

    if(isset($_FILES["file"]) && $_FILES["file"]["error"] === UPLOAD_ERR_OK) {
        $targetFilePath = "../../../uploads/ebooks/files/" . $fileName;
        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
    } else {
        http_response_code(401);
        echo json_encode(["status" => "error", "message" => "Ebook pdf file not found"]);
        exit;
    }

    if(isset($_FILES["cover"]) && $_FILES["cover"]["error"] === UPLOAD_ERR_OK) {
        $targetCoverPath = "../../../uploads/ebooks/covers/" . $coverName;
        move_uploaded_file($_FILES["cover"]["tmp_name"], $targetCoverPath);
    } else {
        http_response_code(401);
        echo json_encode(["status" => "error", "message" => "Ebook cover not found"]);
        exit;
    }

    try {
        // Inserting ebook in database
        $stmt = $pdo->prepare("INSERT INTO ebooks (name, author, edges, language, size, description, pdf_file_path, cover_image_path) VALUES (:name, :author, :edges, :language, :fileSize, :description, :filePath, :coverPath)");
        $stmt->bindParam(':name', $eBookData["name"]);
        $stmt->bindParam(':author', $eBookData["author"]);
        $stmt->bindParam(':edges', $eBookData["edges"]);
        $stmt->bindParam(':language', $eBookData["language"]);
        $stmt->bindParam(':fileSize', $eBookData["fileSize"]);
        $stmt->bindParam(':description', $eBookData["description"]);
        $stmt->bindParam(':filePath', $eBookData["filePath"]);
        $stmt->bindParam(':coverPath', $eBookData["coverPath"]);
        $stmt->execute();

        // Checking selected genres, getting id of ebook and adding genres for that ebook
        if(!empty($eBookData["selectedGenres"])) {
            $selectedGenres = explode(",", $eBookData["selectedGenres"]);
            $stmt = $pdo->prepare("SELECT LAST_INSERT_ID() AS ebook_id");
            $stmt->execute();
            $result = $stmt->fetch();
            $ebookId = $result["ebook_id"];

            $sql = "INSERT INTO added_ebooks_genres (ebook_id, genre_id) VALUES ";

            $placeholders = [];
            $values = [];
            foreach ($selectedGenres as $genreId) {
                $placeholders[] = "(?, ?)";
                $values[] = $ebookId;
                $values[] = $genreId;
            }

            $sql .= implode(", ", $placeholders);

            $stmt = $pdo->prepare($sql);
            $stmt->execute($values);
        }

        http_response_code(201);
        echo json_encode(["status" => "success", "message" => "Ebook added successfully"]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "fail", "message" => "Operation failed"]);
    }
}
exit;