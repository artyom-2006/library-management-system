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
    <link rel="shortcut icon" href="../../resources/images/admin-icon.png" type="image/x-icon">
</head>
<body>
    <?php include "../../../includes/loader.inc.php"; ?>
    <?php include "../../includes/navigation.inc.php"; ?>
    <main>
        <?php include "../../includes/header.inc.php"; ?>
        <div id="main-content">
            <div id="heading-block">
                <h1 class="section-heading">Էլեկտրոնային գրքեր</h1>
                <h2 class="heading">Էլեկտրոնային գրքերի ժանրի ավելացում</h2>
            </div>
            <div id="form-container">
                <form id="add-genre-form" enctype="multipart/form-data">
                    <div class="first-part">
                        <div class="left-side">
                            <label for="name-input">Ժանրի անվանումը</label>
                            <input type="text" id="name-input" class="genre-name" name="name" autocomplete="off">
                            <p id="name-error-message" class="error-message"></p>
                        </div>
                    </div>
                    <div class="second-part">
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
    <script type="module" src="../../js/pages/add-section-data.js"></script>
</body>
</html>