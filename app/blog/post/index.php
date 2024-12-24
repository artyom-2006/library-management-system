<!DOCTYPE html>
<html lang="hy">
<head>
    <?php require "../../../includes/meta-tags.inc.php"; ?>
    <title>Հրապարակում</title>
    <link rel="stylesheet" href="../../../css/normalize.min.css">
    <link rel="stylesheet" href="../../../css/components/loader.css">
    <link rel="stylesheet" href="../../../css/variables/light-mode-variables.css" id="theme-stylesheet">
    <link rel="stylesheet" href="../../../css/variables/variables.css">
    <link rel="stylesheet" href="../../../css/pages/post.css">
    <link rel="stylesheet" href="../../../css/fonts.css">
    <link rel="stylesheet" href="../../../css/components/header.css">
    <link rel="stylesheet" href="../../../css/components/footer.css">
    <link rel="stylesheet" href="../../../css/components/layer.css">
    <link rel="stylesheet" href="../../../css/components/button.css">
    <link rel="shortcut icon" href="../../../resources/images/opened-book-icon.png" type="image/x-icon">
</head>
<body>
    <?php include "../../../includes/loader.inc.php"; ?>
    <div id="layer"></div>
    <?php require "../../../includes/header.inc.php"; ?>
    <main id="main-section">
        <section id="post-section">
            <h1 id="title"></h1>
            <p id="description"></p>
            <img src="" alt="" id="image">
        </section>
    </main>
    <?php require "../../../includes/footer.inc.php"; ?>
    <script src="../../../js/components/loader.js"></script>
    <script src="../../../js/theme.js"></script>
    <script type="module" src="../../../js/pages/post-view-process.js"></script>
    <script src="../../../js/components/hamburger-menu.js"></script>
</body>
</html>