<?php
session_start();

require "../../functions/check-admin-login.inc.php";

if(!isAdminLoggedIn()) {
    header("Location: ../");
    exit;
}
?>

<!DOCTYPE html>
<html lang="hy">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ավելացնել գրառում</title>
    <link rel="stylesheet" href="../../../css/normalize.min.css">
    <link rel="stylesheet" href="../../../css/components/loader.css">
    <link rel="stylesheet" href="../../css/pages/styles.css">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/navigation.css">
    <link rel="stylesheet" href="../../css/components/form.css">
    <link rel="shortcut icon" href="../../resources/images/admin-icon.png" type="image/x-icon">
</head>
<body>
    <?php include "../../../includes/loader.inc.php"; ?>
    <?php include "../../includes/navigation.inc.php"; ?>
    <main>
        <?php include "../../includes/header.inc.php"; ?>
        <div id="main-content">
            <div id="heading-block">
                <h1 class="section-heading">Բլոգ</h1>
                <h2 class="heading">Ավելացնել գրառում</h2>
            </div>
            <div id="form-container">
                <form id="add-post-form" enctype="multipart/form-data">
                    <div class="first-part">
                        <div class="left-side">
                            <label for="title-input">Գրառման վերնագիր</label>
                            <input type="text" id="title-input" name="name" autocomplete="off">
                            <p id="title-error-message" class="error-message"></p>
                        </div>
                        <div class="right-side">
                            <label>Նկարագրություն</label>
                            <textarea name="description" id="description-input"></textarea>
                            <p id="description-error-message" class="error-message"></p>
                        </div>
                    </div>
                    <div class="second-part">
                        <hr>
                        <div class="top-row">
                            <label for="image-input">Գրառման առաջին նկարը</label>
                            <p class="explanation">Նկարը կարող է լինել JPG/JPEG, PNG, WEBP, SVG ձևաչափերով</p>
                            <input type="file" id="image-input" name="image">
                            <p id="image-error-message" class="error-message"></p>
                        </div>
                        <div class="bottom-row">
                            <button type="submit">Ավելացնել</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="../../../js/components/loader.js"></script>
    <script src="../../js/components/collapsible-menu.js"></script>
    <script src="../../js/components/log-out.js"></script>
    <script type="module" src="../../js/pages/add-post-data.js"></script>
</body>
</html>