<!DOCTYPE html>
<html lang="hy">
<head>
    <?php require "../../includes/meta-tags.inc.php"; ?>
    <title>Պահպանված գրքեր</title>
    <link rel="stylesheet" href="../../css/normalize.min.css">
    <link rel="stylesheet" href="../../css/components/loader.css">
    <link rel="stylesheet" href="../../css/variables/light-mode-variables.css" id="theme-stylesheet">
    <link rel="stylesheet" href="../../css/variables/variables.css">
    <link rel="stylesheet" href="../../css/pages/options-page.css">
    <link rel="stylesheet" href="../../css/fonts.css">
    <link rel="stylesheet" href="../../css/components/header.css">
    <link rel="stylesheet" href="../../css/components/footer.css">
    <link rel="stylesheet" href="../../css/components/button.css">
    <link rel="stylesheet" href="../../css/components/layer.css">
    <link rel="shortcut icon" href="../../resources/images/opened-book-icon.png" type="image/x-icon">
</head>
<body>
    <?php include "../../includes/loader.inc.php"; ?>
    <div id="layer"></div>
    <?php require "../../includes/header.inc.php"; ?>
    <main>
        <div id="description">
            <h1>Պահպանված գրքեր</h1>
            <p>Պահպանված գրքեր բաժնում կարող եք տեսնել ձեր կողմից պահպանված էլեկտրոնային և ֆիզիկական գրքերը</p>
        </div>
        <div id="options">
            <a href="./saved-ebooks/">
                <div class="option">
                    <img src="../../resources/images/saved-ebooks-option-icon.png" alt="Պահպանված էլեկտրոնային գրքեր">
                    <p>Պահպանված էլեկտրոնային գրքեր</p>
                </div>
            </a>
            <a href="./saved-physical-books/">
                <div class="option">
                    <img src="../../resources/images/saved-physical-books-option-icon.png" alt="Պահպանված ֆիզիկական գրքեր">
                    <p>Պահպանված ֆիզիկական գրքեր</p>
                </div>
            </a>
        </div>
    </main>
    <?php require "../../includes/footer.inc.php"; ?>
    <script src="../../js/components/loader.js"></script>
    <script src="../../js/theme.js"></script>
    <script src="../../js/components/hamburger-menu.js"></script>
</body>
</html>