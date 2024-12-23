<!DOCTYPE html>
<html lang="hy">
<head>
    <?php require "../../includes/meta-tags.inc.php"; ?>
    <title>Անձնական հաշիվ</title>
    <link rel="stylesheet" href="../../css/normalize.min.css">
    <link rel="stylesheet" href="../../css/components/loader.css">
    <link rel="stylesheet" href="../../css/variables/light-mode-variables.css" id="theme-stylesheet">
    <link rel="stylesheet" href="../../css/variables/variables.css">
    <link rel="stylesheet" href="../../css/pages/user-account.css">
    <link rel="stylesheet" href="../../css/fonts.css">
    <link rel="stylesheet" href="../../css/components/header.css">
    <link rel="stylesheet" href="../../css/components/footer.css">
    <link rel="stylesheet" href="../../css/components/layer.css">
    <link rel="stylesheet" href="../../css/components/button.css">
    <link rel="shortcut icon" href="../../resources/images/opened-book-icon.png" type="image/x-icon">
</head>
<body>
    <?php include "../../includes/loader.inc.php"; ?>
    <div id="layer"></div>
    <?php require "../../includes/header.inc.php"; ?>
    <main id="main-section">
        <section id="section-name-bar">
            <div id="section-name">
                <p class="section-name">Անձնական հաշիվ</p>
            </div>
        </section>
        <section id="account-information">
            <div id="form-section">
                <form id="form">
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
                        <label for="phone-input">Հեռախոս</label>
                        <input type="text" id="phone-input" name="phone" autocomplete="off">
                        <p class="not-valid-message" id="phone-not-valid-message"></p>
                    </div>
                    <div id="passwords-input-field">
                        <label for="password-input">Գաղտնաբառ</label>
                        <input type="text" id="old-password-input" name="password" autocomplete="off" placeholder="Հին գաղտնաբառը">
                        <p class="not-valid-message" id="password-not-valid-message"></p>
                        <input type="text" id="new-password-input" name="password" autocomplete="off" placeholder="Նոր գաղտնաբառ">
                        <p class="not-valid-message" id="password-not-valid-message"></p>
                        <input type="text" id="repeat-new-password-input" name="password" autocomplete="off" placeholder="Կրկնեք նոր գաղտնաբառը">
                        <p class="not-valid-message" id="password-not-valid-message"></p>
                    </div>
                    <button type="submit" id="main-button">Պահպանել</button>
                    <button type="button" id="text-button">Դուրս գալ</button>
                </form>
            </div>
            <div id="illustration">
                <img src="../../resources/illustrations/user-account-illustration.svg" alt="Օգտագործող իլլուստրացիա">
            </div>
        </section>
    </main>
    <?php require "../../includes/footer.inc.php"; ?>
    <script src="../../js/components/loader.js"></script>
    <script src="../../js/theme.js"></script>
    <script type="module" src="../../js/pages/user-account.js"></script>
    <script src="../../js/components/hamburger-menu.js"></script>
</body>
</html>