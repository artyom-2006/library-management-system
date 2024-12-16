<!DOCTYPE html>
<html lang="hy">
<head>
    <?php require "../../includes/meta-tags.inc.php"; ?>
    <title>Ժանրեր</title>
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
            <h1>Ժանրեր</h1>
            <p>Ժանրեր բաժնում կարող եք տեսնել էլեկտրոնային և ֆիզիկական գրքերի ժանրերը իրենց գրքերով</p>
        </div>
        <div id="options">
            <a href="./ebooks-genres/">
                <div class="option">
                    <img src="../../resources/images/ebooks-genres-option-icon.png" alt="Էլեկտրոնային գրքերի ժանրեր">
                    <p>Էլեկտրոնային գրքերի ժանրեր</p>
                </div>
            </a>
            <a href="./physical-books-genres/">
                <div class="option">
                    <img src="../../resources/images/physical-books-genres-option-icon.png" alt="Ֆիզիկական գրքերի ժանրեր">
                    <p>Ֆիզիկական գրքերի ժանրեր</p>
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