import { renderEbooks, setNoBooksView } from "./book-functions.js";

// General functions for both ebooks and physical books genres
export function getGenresData(genresType) {
    fetch(`/Library/app/genres/get-genres-data.php?type=${genresType}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then((response) => response.json())
    .then((response) => {
        if(response.status === "success") {
            if(genresType === "ebook") {
                renderEbooksGenres(response.genresData);
            } else if(genresType === "pbook") {
                renderPbooksGenres(response.genresData);
            }
        } else if(response.status === "fail") {
            setNoGenresView();
        }
    })
    .catch((error) => {
        console.error(error);
    });
}

function setNoGenresView() {
    const mainSection = document.getElementById("main-section");

    let noGenressViewSection = document.createElement("div");
    noGenressViewSection.id = "no-genres-view";

    let illustrationImage = document.createElement("img");
    illustrationImage.src = "/Library/resources/illustrations/no-genres-illustration.svg";
    illustrationImage.alt = "Ձիավար աղջիկ";

    let message = document.createElement("p");
    message.innerText = "Ժանրեր դեռևս չկան";

    noGenressViewSection.append(illustrationImage, message);
    mainSection.append(noGenressViewSection);
}

// Functions for genres of ebooks
function renderEbooksGenres(genresData) {
    const mainSection = document.getElementById("main-section");

    let genresList = document.createElement("div");
    genresList.id = "genres-list";

    genresData.forEach(genre => {
        let genreCard = document.createElement("div");
        genreCard.id = "genre-card";
        genreCard.addEventListener("click", () => storeSingleEbookGenre(genre.genre_id));

        let genreName = document.createElement("p");
        genreName.classList.add("genre-name");
        genreName.textContent = genre.genre_name;

        genreCard.append(genreName);
        genresList.append(genreCard);
    });

    mainSection.append(genresList);
}

export function storeSingleEbookGenre(genreId) {
    fetch(`/Library/app/genres/store-single-ebook-genre.php?id=${genreId}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then((response) => response.json())
    .then((response) => {
        if(response.status === "success") {
           window.location.href = "/Library/app/genres/ebooks-genres/ebooks-genre-view/";
        }
    })
    .catch((error) => {
        console.error(error);
    });
}

export function getEbooksByGenre() {
    const genreName = document.querySelector("#section-name .second-name");

    fetch("/Library/app/genres/ebooks-genres/ebooks-genre-view/get-ebooks-by-genre.php", {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then((response) => response.json())
    .then((response) => {
        if(response.status === "success") {
            // Setting genre name
            genreName.textContent = response.genreName.genre_name;

            // If there's no ebooks, we set no books mode, and if there's ebooks, we render them in page
            if(response.ebooksDataByGenre.length !== 0) {
                renderEbooks(response.ebooksDataByGenre);
            } else {
                setNoBooksView("Այս ժանրով գրքեր դեռևս չեն ավելացվել");
            }
        }
    })
    .catch((error) => {
        console.error(error);
    });
}

// Functions for genres of pbooks
function renderPbooksGenres() {
    const mainSection = document.getElementById("main-section");

    let genresList = document.createElement("div");
    genresList.id = "genres-list";

    // ...

    mainSection.append(genresList);
}