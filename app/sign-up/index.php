<!DOCTYPE html>
<html lang="hy">
<head>
    <?php require "../../includes/meta-tags.inc.php"; ?>
    <title>Գրանցում</title>
    <link rel="stylesheet" href="../../css/normalize.min.css">
    <link rel="stylesheet" href="../../css/components/loader.css">
    <link rel="stylesheet" href="../../css/variables/light-mode-variables.css" id="theme-stylesheet">
    <link rel="stylesheet" href="../../css/variables/variables.css">
    <link rel="stylesheet" href="../../css/pages/sign-up-log-in.css">
    <link rel="stylesheet" href="../../css/fonts.css">
    <link rel="stylesheet" href="../../css/components/header.css">
    <link rel="stylesheet" href="../../css/components/footer.css">
    <link rel="stylesheet" href="../../css/components/layer.css">
    <link rel="stylesheet" href="../../css/components/modal-window.css">
    <link rel="stylesheet" href="../../css/components/button.css">
    <link rel="shortcut icon" href="../../resources/images/opened-book-icon.png" type="image/x-icon">
</head>
<body>
    <?php include "../../includes/loader.inc.php"; ?>
    <div id="layer">
        <div id="modal-window">
            <div id="modal-content">
                <span class="heading"></span>
                <p class="content"></p>
            </div>
            <div id="modal-buttons"></div>
        </div>
    </div>
    <?php require "../../includes/header.inc.php"; ?>
    <main>
        <section id="illustration">
            <img src="../../resources/illustrations/sign-up-illustration.svg" class="sign-up-illustration" alt="մարդիկ իլլուստրացիա">
        </section>
        <section id="form-section">
            <form id="form">
                <h3>Գրանցվել</h3>
                <div id="input-field">
                    <label for="name-input">Անուն</label>
                    <input type="text" id="name-input" name="name" autocomplete="off">
                    <p class="not-valid-message" id="name-not-valid-message"></p>
                </div>
                <div id="input-field">
                    <label for="surname-input">Ազգանուն</label>
                    <input type="text" id="surname-input" name="surname" autocomplete="off">
                    <p class="not-valid-message" id="surname-not-valid-message"></p>
                </div>
                <div id="input-field">
                    <label for="email-input">Էլ․ հասցե</label>
                    <input type="text" id="email-input" name="email" autocomplete="off">
                    <p class="not-valid-message" id="email-not-valid-message"></p>
                </div>
                <div id="input-field">
                    <label for="phone-input">Հեռախոս</label>
                    <input type="text" id="phone-input" name="phone" autocomplete="off">
                    <p class="not-valid-message" id="phone-not-valid-message"></p>
                </div>
                <div id="input-field">
                    <label for="password-input">Գաղտնաբառ</label>
                    <input type="text" id="password-input" name="password" autocomplete="off">
                    <p class="not-valid-message" id="password-not-valid-message"></p>
                </div>
                <button type="submit" id="main-button" class="disabled">Գրանցվել</button>
                <p>Ունե՞ք հաշիվ<a href="../log-in/">Մուտք</a></p>
            </form>
        </section>
    </main>
    <?php require "../../includes/footer.inc.php"; ?>
    <script src="../../js/components/loader.js"></script>
    <script src="../../js/theme.js"></script>
    <script type="module" src="../../js/validation/validation.js"></script>
    <script src="../../js/components/disabled-button.js"></script>
    <script src="../../js/components/modal-window.js"></script>
    <script src="../../js/pages/registration-data.js"></script>
    <script src="../../js/components/hamburger-menu.js"></script>
</body>
</html>