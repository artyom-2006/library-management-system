<!DOCTYPE html>
<html lang="hy">
<head>
    <?php require "../../../includes/meta-tags.inc.php"; ?>
    <title>Գրադարան - Վերականգնում</title>
    <link rel="stylesheet" href="../../../css/normalize.min.css">
    <link rel="stylesheet" href="../../../css/components/loader.css">
    <link rel="stylesheet" href="../../../css/variables/light-mode-variables.css" id="theme-stylesheet">
    <link rel="stylesheet" href="../../../css/variables/variables.css">
    <link rel="stylesheet" href="../../../css/pages/sign-up-log-in.css">
    <link rel="stylesheet" href="../../../css/fonts.css">
    <link rel="stylesheet" href="../../../css/components/header.css">
    <link rel="stylesheet" href="../../../css/components/footer.css">
    <link rel="stylesheet" href="../../../css/components/layer.css">
    <link rel="stylesheet" href="../../../css/components/modal-window.css">
    <link rel="stylesheet" href="../../../css/components/button.css">
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
            <div id="modal-buttons"></div>
        </div>
    </div>
    <?php require "../../../includes/header.inc.php"; ?>
    <main>
        <section id="illustration">
            <img src="../../../resources/illustrations/account-search-illustration.svg" class="account-search-illustration" alt="մարդիկ իլլուստրացիա">
        </section>
        <section id="form-section">
            <div id="description">
                <h3>Գաղտնաբառի վերականգնում</h3>
                <h4>Հաշվի որոնում</h4>
                <p>Հաշվի գաղտնաբառը փոփոխելու համար դուք պետք է հաստատեք հաշվին կցված էլեկտրոնային հասցեն</p>
            </div>
            <form id="form">
                <div id="input-field">
                    <label for="email-input">Էլ․ հասցե</label>
                    <input type="text" id="email-input" name="email" autocomplete="off">
                    <p class="not-valid-message" id="email-not-valid-message"></p>
                </div>
                <button type="submit" id="main-button" class="disabled">Շարունակել</button>
            </form>
        </section>
    </main>
    <?php require "../../../includes/footer.inc.php"; ?>
    <script src="../../../js/components/loader.js"></script>
    <script src="../../../js/theme.js"></script>
    <script type="module" src="../../../js/validation/validation.js"></script>
    <script src="../../../js/components/disabled-button.js"></script>
    <script src="../../../js/components/modal-window.js"></script>
    <script src="../../../js/pages/verify-email.js"></script>
    <script src="../../../js/components/hamburger-menu.js"></script>
</body>
</html>