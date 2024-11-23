<?php

$config = require($_SERVER["DOCUMENT_ROOT"] . "/Library/config/config.php");

try {
    $pdo = new PDO($config["database"]["dsn"], $config["database"]["username"], $config["database"]["password"]);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log($e->getMessage());
}