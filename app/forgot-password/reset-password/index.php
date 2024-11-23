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
            <img src="../../../resources/illustrations/new-password-illustration.svg" class="account-confirmation-illustration" alt="մարդիկ իլլուստրացիա">
        </section>
        <section id="form-section">
            <div id="description">
                <h3>Գաղտնաբառի վերականգնում</h3>
                <h4>Նոր գաղտնաբառ</h4>
                <p>Մուտքագրեք նոր գաղտնաբառ և այսուհետ կիրառեք ձեր նոր գաղտնաբառը</p>
            </div>
            <form id="form">
                <div id="input-field">
                    <label for="password-input">Գաղտնաբառ</label>
                    <input type="text" id="password-input" name="password" autocomplete="off">
                    <p class="not-valid-message" id="password-not-valid-message"></p>
                </div>
                <button type="submit" id="main-button" class="disabled">Հաստատել</button>
            </form>
        </section>
    </main>
    <?php require "../../../includes/footer.inc.php"; ?>
    <script src="../../../js/components/loader.js"></script>
    <script src="../../../js/theme.js"></script>
    <script type="module" src="../../../js/validation/validation.js"></script>
    <script src="../../../js/components/disabled-button.js"></script>
    <script src="../../../js/components/modal-window.js"></script>
    <script src="../../../js/pages/reset-password.js"></script>
    <script src="../../../js/components/hamburger-menu.js"></script>
</body>
</html>