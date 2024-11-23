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
        <div id="modal-window">
            <div id="ebook-cover">
                <img src="https://upload.wikimedia.org/wikipedia/hy/6/6d/%D4%B5%D5%BE_%D5%B8%D5%B9_%D5%B8%D6%84_%D5%B9%D5%B4%D5%B6%D5%A1%D6%81....jpg" alt="Կարպատյան դղյակը">
            </div>
            <div id="ebook-info">
                <p class="modal-ebook-name">Կարպատյան դղյակը</p>
                <p class="modal-ebook-author">Ժյուլ Վեռն</p>
                <div class="modal-ebook-property">
                    <p class="property">Էջեր</p>
                    <p class="value">264</p>
                </div>
                <div class="modal-ebook-property">
                    <p class="property">Լեզու</p>
                    <p class="value">Հայերեն</p>
                </div>
                <div class="modal-ebook-sections">
                    <p class="property">Բաժիններ</p>
                    <div class="sections">
                        <a href="" class="section">Գեղարվեստական գրականություն</a>
                        <a href="" class="section">Գեղարվեստական</a>
                        <a href="" class="section">Գեղարվեստական գրականություն</a>
                        <a href="" class="section">Գեղարվեստական գրականություն</a>
                        <a href="" class="section">Գեղարվեստական</a>
                        <a href="" class="section">Գեղարվեստական գրականություն</a>
                        <a href="" class="section">Գեղարվեստական</a>
                        <a href="" class="section">Գեղարվեստական գրականություն</a>
                    </div>
                </div>
                <div class="see-ebook-button-box">
                    <button type="submit">Տեսնել գիրքը</button>
                </div>
            </div>
        </div>
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
        <!--
        <div id="ebooks-list">

            <div id="ebook-card">
                <div class="img-block">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS5bpadawrHazrr4_d-X8zLtnoE2rfzngMHtg&s" alt="Կարպատյան դղյակը">
                </div>
                <div id="info-block">
                    <p class="ebook-name">Կարպատյան դղյակը</p>
                    <p class="ebook-author">Ժյուլ Վեռն</p>
                    <button type="button">Տեսնել գիրքը</button>
                </div>
            </div>  

        </div>
        -->
    </main>
    <?php require "../../../includes/footer.inc.php"; ?>
    <script src="../../../js/components/loader.js"></script>
    <script src="../../../js/theme.js"></script>
    <script type="module" src="../../../js/pages/ebooks-list-process.js"></script>
    <script src="../../../js/components/hamburger-menu.js"></script>
    <script src="../../../js/components/ebook-modal-view.js"></script>
</body>
</html>