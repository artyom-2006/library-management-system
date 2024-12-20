<?php
session_start();

require "../functions/check-admin-login.inc.php";

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
    <title>Ղեկավարման վահանակ</title>
    <link rel="stylesheet" href="../../css/normalize.min.css">
    <link rel="stylesheet" href="../../css/components/loader.css">
    <link rel="stylesheet" href="../css/pages/styles.css">
    <link rel="stylesheet" href="../css/pages/dashboard.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/navigation.css">
    <link rel="shortcut icon" href="../resources/images/admin-icon.png" type="image/x-icon">
</head>
<body>
    <?php include "../../includes/loader.inc.php"; ?>
    <?php include "../includes/navigation.inc.php"; ?>
    <main>
        <?php include "../includes/header.inc.php"; ?>
        <div id="main-content">
            <div id="heading-block">
                <h1 class="section-heading">Գլխավոր</h1>
            </div>
            <div id="dashboard-container">
                <div class="information-card" id="users-quantity-card">
                    <p class="quantity"></p>
                    <p class="subject">Օգտատեր</p>
                </div>
                <div class="information-card" id="ebooks-quantity-card">
                    <p class="quantity"></p>
                    <p class="subject">Էլեկտրոնային գրքեր</p>
                </div>
                <div class="information-card" id="books-quantity-card">
                    <p class="quantity">0</p>
                    <p class="subject">Ֆիզիկական գրքեր</p>
                </div>
                <div class="information-card" id="empty-one">
                    <p class="quantity">0</p>
                    <p class="subject">Ամրագրում</p>
                </div>
            </div>
        </div>
    </main>
    <script src="../../js/components/loader.js"></script>
    <script src="../js/components/collapsible-menu.js"></script>
    <script src="../js/components/log-out.js"></script>
    <script type="module" src="../js/pages/get-dashboards-data.js"></script>
</body>
</html>