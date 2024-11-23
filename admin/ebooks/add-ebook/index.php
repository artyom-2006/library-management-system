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
    <title>Էլեկտրոնային գրքեր</title>
    <link rel="stylesheet" href="../../../css/normalize.min.css">
    <link rel="stylesheet" href="../../../css/components/loader.css">
    <link rel="stylesheet" href="../../css/pages/styles.css">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/navigation.css">
    <link rel="stylesheet" href="../../css/components/form.css">
    <link rel="shortcut icon" href="../../../resources/images/admin-icon.png" type="image/x-icon">
</head>
<body>
    <?php include "../../../includes/loader.inc.php"; ?>
    <?php include "../../includes/navigation.inc.php"; ?>
    <main>
        <?php include "../../includes/header.inc.php"; ?>
        <div id="main-content">
            <div id="heading-block">
                <h1 class="section-heading">Էլեկտրոնային գրքեր</h1>
                <h2 class="heading">Ավելացնել էլեկտրոնային գիրք</h2>
            </div>
            <div id="form-container">
                <form id="add-ebook-form" enctype="multipart/form-data">
                    <div class="first-part">
                        <div class="left-side">
                            <label for="name-input">Գրքի անվանումը</label>
                            <input type="text" id="name-input" name="name" autocomplete="off">
                            <p id="name-error-message" class="error-message"></p>
                            <label for="author-input">Հեղինակը</label>
                            <input type="text" id="author-input" name="author" autocomplete="off">
                            <p id="author-error-message" class="error-message"></p>
                            <label for="edges-input">Էջերի քանակը</label>
                            <input type="text" id="edges-input" name="edges" autocomplete="off">
                            <p id="edges-error-message" class="error-message"></p>
                            <label for="language-input">Լեզուն</label>
                            <input type="text" id="language-input" name="language" autocomplete="off">
                            <p id="language-error-message" class="error-message"></p>
                        </div>
                        <div class="right-side">
                            <label>Նկարագրություն</label>
                            <textarea name="description" id="description-input"></textarea>
                            <p id="description-error-message" class="error-message"></p>
                            <label class="sections-label">Բաժիններ</label>
                            
                            <!-- This is one line of checkbox for section -->
                            <label class="section-row">
                                <input type="checkbox" name="section">
                                Գեղարվեստական գրականություն
                            </label>

                        </div>
                    </div>
                    <div class="second-part">
                        <hr>
                        <div class="top-row">
                            <label for="file-input">Գրքի PDF ֆայլը</label>
                            <p class="explanation">Ֆայլի ֆորմատը պետք է լինի միայն PDF ձևաչափով</p>
                            <input type="file" id="file-input" name="file">
                            <p id="file-error-message" class="error-message"></p>
                            <label for="cover-input">Գրքի կազմի նկարը</label>
                            <p class="explanation">Նկարը կարող է լինել JPG/JPEG, PNG, WEBP, SVG ձևաչափերով</p>
                            <input type="file" id="cover-input" name="cover">
                            <p id="cover-error-message" class="error-message"></p>
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
    <script type="module" src="../../js/pages/add-ebook-data.js"></script>
</body>
</html>