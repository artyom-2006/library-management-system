<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentFolder = basename(dirname($_SERVER['PHP_SELF'])); // Gives name of currect directory
$links = [
    "general" => '<a href="/Library/app/general/">Գլխավոր</a>',
    "books" => '<a href="/Library/app/books/">Գրքեր</a>',
    "genres" => '<a href="/Library/app/genres/">Ժանրեր</a>',
    "blog" => '<a href="/Library/app/blog/">Բլոգ</a>',
    "aboutUs" => '<a href="/Library/app/about-us/">Մեր մասին</a>',
    "contact" => '<a href="/Library/app/contact/">Կապ</a>'
];

// Setting active page on links
switch($currentFolder) {
    case "general":
        $links["general"] = '<a href="/Library/app/general/" class="active">Գլխավոր</a>';
        break;

    case "books":
        $links["books"] = '<a href="/Library/app/books/" class="active">Գրքեր</a>';
        break;

    case "genres":
        $links["genres"] = '<a href="/Library/app/genres/" class="active">Ժանրեր</a>';
        break;

    case "about-us":
        $links["aboutUs"] = '<a href="/Library/app/about-us/" class="active">Մեր մասին</a>';
        break;

    case "contact":
        $links["contact"] = '<a href="/Library/app/contact/" class="active">Կապ</a>';
        break;

    case "blog":
        $links["blog"] = '<a href="/Library/app/blod/" class="active">Բլոգ</a>';
        break;
}

$headerLinks = [
    "navFirstLink" => $links["general"],
    "navSecondLink" => $links["books"],
    "navThirdLink" => $links["genres"],
    "navFourthLink" => $links["blog"],
    "navFivthLink" => $links["aboutUs"],
    "navFirstButton" => '<a href="/Library/app/saved-books/" class="icon-link-block"><div class="icon-link saved-books"></div></a>',
    "navSecondButton" => '<a href="/Library/app/sign-up/" class="button">Գրանցվել</a>'
];

if($currentFolder === 'sign-up') {
    $headerLinks["navSecondButton"] = '<a href="/Library/app/log-in/" class="button">Մուտք</a>';
}

// Checking if user is logged in or not
if(isset($_SESSION["user_id"])) {
    $headerLinks["navSecondButton"] = '<a href="/Library/app/account/" class="icon-link-block"><div class="icon-link user-account"></div></a>';
}
?>

<header>
    <a href="/Library/index.php" class="link-div">
        <div id="heading">
            <img src="/Library/resources/images/opened-book-icon.png" alt="Բացված գիրք">
            <span>Գրադարան</span>
        </div>
    </a>
    <div class="hamburger" id="hamburger"></div>
    <nav id="navigation">
        <ul>
            <li><?= $headerLinks["navFirstLink"] ?></li>
            <li><?= $headerLinks["navSecondLink"] ?></li>
            <li><?= $headerLinks["navThirdLink"] ?></li>
            <li><?= $headerLinks["navFourthLink"] ?></li>
            <li><?= $headerLinks["navFivthLink"] ?></li>
        </ul>
        <?= $headerLinks["navFirstButton"] ?>
        <?= $headerLinks["navSecondButton"] ?>
    </nav>
</header>