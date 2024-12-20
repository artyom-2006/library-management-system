<!DOCTYPE html>
<html lang="hy">
<head>
    <?php require "../../../includes/meta-tags.inc.php"; ?>
    <title>Էլեկտրոնային գրքի դիտում</title>
    <link rel="stylesheet" href="../../../css/normalize.min.css">
    <link rel="stylesheet" href="../../../css/components/loader.css">
    <link rel="stylesheet" href="../../../css/variables/light-mode-variables.css" id="theme-stylesheet">
    <link rel="stylesheet" href="../../../css/variables/variables.css">
    <link rel="stylesheet" href="../../../css/pages/ebook-view.css">
    <link rel="stylesheet" href="../../../css/fonts.css">
    <link rel="stylesheet" href="../../../css/scroll.css">
    <link rel="stylesheet" href="../../../css/components/header.css">
    <link rel="stylesheet" href="../../../css/components/footer.css">
    <link rel="stylesheet" href="../../../css/components/button.css">
    <link rel="stylesheet" href="../../../css/components/layer.css">
    <link rel="stylesheet" href="../../../css/components/modal-window.css">
    <link rel="shortcut icon" href="../../../resources/images/opened-book-icon.png" type="image/x-icon">
</head>
<body>
    <?php include "../../../includes/loader.inc.php"; ?>
    <div id="layer">
        <div id="modal-window">
            <div id="modal-content">
                <span class="heading"></span>
                <p class="content"></p>
            </div>
            <div id="modal-buttons">
                <button type="button" id="main-modal-button">Լավ</button>
            </div>
        </div>
    </div>
    <?php require "../../../includes/header.inc.php"; ?>
    <main>
        <div id="ebook-view">
            <div id="ebook-details">
                <div class="ebook-cover">
                    <img src="" alt="">
                </div>
                <div class="ebook-info">
                    <p class="ebook-name"></p>
                    <p class="ebook-author"></p>
                    <div class="ebook-properties"></div>
                    <div class="ebook-sections">
                        <p class="property"></p>
                        <div class="sections"></div>
                    </div>
                    <div class="download-ebook-button-box">
                        <button type="button" id="main-button">Ներբեռնել գիրքը</button>
                        <button type="button" id="save-book-button"></button>
                    </div>
                </div>
            </div>
            <div id="ebook-description">
                <h3>Նկարագրություն</h3>
                <p class="description"></p>
            </div>
        </div>
    </main>
    <?php require "../../../includes/footer.inc.php"; ?>
    <script src="../../../js/components/loader.js"></script>
    <script src="../../../js/theme.js"></script>
    <script type="module" src="../../../js/pages/ebook-view-process.js"></script>
    <script src="../../../js/components/hamburger-menu.js"></script>
</body>
</html>