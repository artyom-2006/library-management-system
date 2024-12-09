<!DOCTYPE html>
<html lang="hy">
<head>
    <?php require "../../../includes/meta-tags.inc.php"; ?>
    <title>Էլեկտրոնային գրքեր</title>
    <link rel="stylesheet" href="../../../css/normalize.min.css">
    <link rel="stylesheet" href="../../../css/components/loader.css">
    <link rel="stylesheet" href="../../../css/variables/light-mode-variables.css" id="theme-stylesheet">
    <link rel="stylesheet" href="../../../css/variables/variables.css">
    <link rel="stylesheet" href="../../../css/pages/ebooks-list.css">
    <link rel="stylesheet" href="../../../css/fonts.css">
    <link rel="stylesheet" href="../../../css/components/header.css">
    <link rel="stylesheet" href="../../../css/components/footer.css">
    <link rel="stylesheet" href="../../../css/components/layer.css">
    <link rel="stylesheet" href="../../../css/components/button.css">
    <link rel="shortcut icon" href="../../../resources/images/opened-book-icon.png" type="image/x-icon">
</head>
<body>
    <?php include "../../../includes/loader.inc.php"; ?>
    <div id="layer">
        <div id="modal-window"></div>
    </div>
    <?php require "../../../includes/header.inc.php"; ?>
    <main id="main-section">
        <div id="section-name-search-bar">
            <div id="section-name">
                <p class="section-name">Էլեկտրոնային գրքեր</p>
                <hr class="line">
            </div>
            <div id="search-bar">
                <input type="search" class="search-bar" placeholder="Որևէ հեղինա՞կ, որևէ գի՞րք․․․">
                <div id="filter-icon"></div>
            </div>
        </div>
    </main>
    <?php require "../../../includes/footer.inc.php"; ?>
    <script src="../../../js/components/loader.js"></script>
    <script src="../../../js/theme.js"></script>
    <script type="module" src="../../../js/pages/ebooks-list-process.js"></script>
    <script src="../../../js/components/hamburger-menu.js"></script>
    <script src="../../../js/components/ebook-modal-view.js"></script>
</body>
</html>