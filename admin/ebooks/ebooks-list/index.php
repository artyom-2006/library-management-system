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
    <link rel="stylesheet" href="../../css/components/table.css">
    <link rel="stylesheet" href="../../css/components/buttons.css">
    <link rel="stylesheet" href="../../../css/variables/light-mode-variables.css">
    <link rel="stylesheet" href="../../../css/components/layer.css">
    <link rel="stylesheet" href="../../css/components/modal-window.css">
    <link rel="shortcut icon" href="../../resources/images/admin-icon.png" type="image/x-icon">
</head>
<body>
    <?php include "../../../includes/loader.inc.php"; ?>
    <div id="layer"></div>
    <?php include "../../includes/ebook-modal-window.inc.php"; ?>
    <?php include "../../includes/navigation.inc.php"; ?>
    <main>
        <?php include "../../includes/header.inc.php"; ?>
        <div id="main-content">
            <div id="heading-block">
                <h1 class="section-heading">Էլեկտրոնային գրքեր</h1>
                <h2 class="heading">Էլեկտրոնային գրքերի ցանկ</h2>
            </div>
            <table id="ebooks-table">
                <thead>
                    <tr class="ebook-header-row">
                        <th>id</th>
                        <th>Անվանում</th>
                        <th>Հեղինակ</th>
                        <th>Էջեր</th>
                        <th>Լեզու</th>
                        <th>Ծավալ</th>
                        <th>Նկարագրություն</th>
                        <th>Ավելացվել է</th>
                        <th>Խմբագրել</th>
                        <th>Ջնջել</th>
                    </tr>
                </thead>
                <tbody class="ebook-body"></tbody>
            </table>
        </div>
    </main>
    <script src="../../../js/components/loader.js"></script>
    <script src="../../js/components/collapsible-menu.js"></script>
    <script type="module" src="../../js/pages/get-ebooks-data.js"></script>
    <script src="../../js/components/log-out.js"></script>
</body>
</html>