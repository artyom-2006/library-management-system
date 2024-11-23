<?php
require "base-url.inc.php";

$currentFolder = basename(dirname($_SERVER['PHP_SELF'])); // տալիս է ընթացիկ folder-ի անունը, օրինակ՝ log-in
$links = [
    "navFirstLink" => '<a href="' . BASE_URL . 'index.php">Գլխավոր</a>',
    "navSecondLink" => '<a href="' . BASE_URL . 'app/about-us/">Մեր մասին</a>',
    "navThirdLink" => '<a href="' . BASE_URL . 'app/contact/"">Կապ</a>',
    "button" => '<a href="' . BASE_URL . 'app/sign-up/" class="button">Գրանցվել</a>'
];

if($currentFolder == 'Library') {
    // homepage ...
} else if($currentFolder == 'sign-up') {
    $links["button"] = '<a href="' . BASE_URL . 'app/log-in/" class="button">Մուտք</a>';
}
?>

<header>
    <a href="<?= BASE_URL ?>index.php" class="link-div">
        <div id="heading">
            <img src="<?= BASE_URL ?>resources/images/opened-book-icon.png" alt="Բացված գիրք">
            <span>Գրադարան</span>
        </div>
    </a>
    <div class="hamburger" id="hamburger"></div>
    <nav id="navigation">
        <ul>
            <li><?= $links["navFirstLink"] ?></li>
            <li><?= $links["navSecondLink"] ?></li>
            <li><?= $links["navThirdLink"] ?></li>
        </ul>
        <?= $links["button"] ?>
    </nav>
</header>