// Ebooks functions
export function getEbooksData() {
    fetch("/Library/app/ebooks/ebooks-list/get-ebooks-data.php", {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then((response) => response.json())
    .then((response) => {
        if(response.status === "success") {
            renderEbooks(response.ebooksData);
        } else if(response.status === "fail") {
            setNoBooksView();
        }
    })
    .catch((error) => {
        console.error(error);
    });
}

function renderEbooks(ebooks) {
    const mainSection = document.getElementById("main-section");

    let ebooksList = document.createElement("div");
    ebooksList.id = "ebooks-list";

    ebooks.forEach(ebook => {
        let ebookCard = document.createElement("div");
        ebookCard.id = "ebook-card";

        // Adding cover image
        let imageBlock = document.createElement("div");
        imageBlock.classList.add("img-block");
        imageBlock.addEventListener("click", () => ebookModalView(ebook));

        let image = document.createElement("img");
        image.src = ebook.cover_image_path;
        image.alt = ebook.name;

        imageBlock.appendChild(image);

        // Adding ebook information
        let infoBlock = document.createElement("div");
        infoBlock.id = "info-block";

        let ebookName = document.createElement("p");
        ebookName.classList.add("ebook-name");
        ebookName.innerText = ebook.name;

        let ebookAuthor = document.createElement("p");
        ebookAuthor.classList.add("ebook-author");
        ebookAuthor.innerText = ebook.author;

        // Adding button for seeing ebook
        let seeEbookPageButton = document.createElement("button");
        seeEbookPageButton.type = "button";
        seeEbookPageButton.innerText = "Տեսնել գիրքը";
        seeEbookPageButton.addEventListener("click", () => storeSingleEbook(ebook.ebook_id));

        infoBlock.append(ebookName, ebookAuthor, seeEbookPageButton);
        ebookCard.append(imageBlock, infoBlock);
        ebooksList.appendChild(ebookCard);
    });

    mainSection.append(ebooksList);
}

function setNoBooksView() {
    const mainSection = document.getElementById("main-section");

    let noBooksViewSection = document.createElement("div");
    noBooksViewSection.id = "no-books-view";

    let illustrationImage = document.createElement("img");
    illustrationImage.src = "/Library/resources/illustrations/no-books-illustration.svg";
    illustrationImage.alt = "Նշումներ";

    let message = document.createElement("p");
    message.innerText = "Գրքեր դեռևս չկան";

    noBooksViewSection.append(illustrationImage, message);
    mainSection.append(noBooksViewSection);
}

function ebookModalView(ebook) {
    document.getElementById("layer").classList.add("show");
    const modalWindow = document.getElementById("modal-window");

    modalWindow.innerHTML = `
        <div id="ebook-cover">
            <img src="${ebook.cover_image_path}" alt="${ebook.name}">
        </div>
        <div id="ebook-info">
            <p class="modal-ebook-name">${ebook.name}</p>
            <p class="modal-ebook-author">${ebook.author}</p>
            <div class="modal-ebook-property">
                <p class="property">Էջեր</p>
                <p class="value">${ebook.edges}</p>
            </div>
            <div class="modal-ebook-property">
                <p class="property">Լեզու</p>
                <p class="value">${ebook.language}</p>
            </div>
            <div class="modal-ebook-property">
                <p class="property">Ավելացման ամսաթիվ</p>
                <p class="value">${ebook.added_at}</p>
            </div>
            <div class="modal-ebook-sections">
                <p class="property">Բաժիններ</p>
                <div class="sections">
                    <a href="" class="section">Գեղարվեստական գրականություն</a>
                    <a href="" class="section">Ֆանտաստիկա</a>
                    <a href="" class="section">Մոգական աշխարհներ</a>
                </div>
            </div>
            <div class="see-ebook-button-box">
                <button type="submit" id="page-view-button">Տեսնել գիրքը</button>
            </div>
        </div>
    `;

    // See book button functionality
    document.getElementById("page-view-button").addEventListener("click", () => storeSingleEbook(ebook.ebook_id));
}

function storeSingleEbook(ebookId) {
    fetch(`/Library/app/ebooks/ebooks-list/store-single-ebook.php?id=${ebookId}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then((response) => response.json())
    .then((response) => {
        if(response.status === "success") {
            window.location.href = "/Library/app/ebooks/ebook-view/";
        }
    })
    .catch((error) => {
        console.error(error);
    });
}

export function getSingleEbook() {
    fetch("/Library/app/ebooks/ebook-view/get-single-ebook.php", {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then((response) => response.json())
    .then((response) => {
        if(response.status === "success") {
            renderEbook(response.ebookData);
        }
    })
    .catch((error) => {
        console.error(error);
    });
}

function renderEbook(ebook) {
    const dataFields = {
        coverImage: document.querySelector("#ebook-details .ebook-cover img"),
        name: document.querySelector("#ebook-details .ebook-info .ebook-name"),
        author: document.querySelector("#ebook-details .ebook-info .ebook-author"),
        properties: document.querySelector("#ebook-details .ebook-info .ebook-properties"),
        description: document.querySelector("#ebook-description .description")
    };
    const propertiesTypes = ["Էջեր", "Լեզու", "Ծավալը", "Ավելացման ամսաթիվ"];
    const propertiesValues = ["edges", "language", "size", "added_at"];

    dataFields.coverImage.src = ebook.cover_image_path;
    dataFields.coverImage.alt = ebook.name;
    dataFields.name.textContent = ebook.name;
    dataFields.author.textContent = ebook.author;

    for(let i = 0; i < propertiesTypes.length; i++) {
        let row = document.createElement("div");
        row.classList.add("row");

        let property = document.createElement("p");
        property.classList.add("property");
        property.textContent = propertiesTypes[i];

        let value = document.createElement("p");
        value.classList.add("value");
        value.textContent = (i !== 2) ? value.textContent = ebook[propertiesValues[i]] : ebook[propertiesValues[i]] + " մբ";

        row.append(property, value);
        dataFields.properties.appendChild(row);
    }

    dataFields.description.textContent = ebook.description;

    // Download button functionality
    const downloadButton = document.getElementById("main-button");
    downloadButton.addEventListener("click", () => downloadFile(ebook.pdf_file_path));

    // Save/unsave button functionality
    const saveEbookButton = document.getElementById("save-book-button");
    saveEbookButton.replaceWith(saveEbookButton.cloneNode(true));

    const updatedSaveEbookButton = document.getElementById("save-book-button");

    // Update button state
    if (ebook.isSaved) {
        updatedSaveEbookButton.classList.add("saved");
        updatedSaveEbookButton.addEventListener("click", () => unsaveEbook(ebook.ebook_id));
    } else {
        updatedSaveEbookButton.classList.add("not-saved");
        updatedSaveEbookButton.addEventListener("click", () => saveEbook(ebook.ebook_id));
    }
}

function saveEbook(ebookId) {
    const saveEbookButton = document.getElementById("save-book-button");
    saveEbookButton.replaceWith(saveEbookButton.cloneNode(true));

    const updatedsaveEbookButton = document.getElementById("save-book-button");

    fetch(`/Library/app/ebooks/ebook-view/save-ebook.php?id=${ebookId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then((response) => response.json())
    .then((response) => {
        if(response.status === "success") {
            updatedsaveEbookButton.classList.remove("not-saved");
            updatedsaveEbookButton.classList.add("saved");
            updatedsaveEbookButton.addEventListener("click", () => unsaveEbook(ebookId));
        }
    })
    .catch((error) => {
        console.error(error);
    });
}

function unsaveEbook(ebookId) {
    const saveEbookButton = document.getElementById("save-book-button");
    saveEbookButton.replaceWith(saveEbookButton.cloneNode(true));

    const updatedSaveEbookButton = document.getElementById("save-book-button");

    fetch(`/Library/app/ebooks/ebook-view/unsave-ebook.php?id=${ebookId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then((response) => response.json())
    .then((response) => {
        if(response.status === "success") {
            updatedSaveEbookButton.classList.remove("saved");
            updatedSaveEbookButton.classList.add("not-saved");
            updatedSaveEbookButton.addEventListener("click", () => saveEbook(ebookId));
        }
    })
    .catch((error) => {
        console.error(error);
    });
}

export function getSavedEbooksData() {
    fetch("/Library/app/saved-books/saved-ebooks/get-saved-ebooks-data.php", {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then((response) => response.json())
    .then((response) => {
        if(response.status === "success") {
            renderEbooks(response.ebooksData);
        } else if(response.status === "fail") {
            setNoBooksView();
        }
    })
    .catch((error) => {
        console.error(error);
    });
}

// Download file function
function downloadFile(filePath) {
    fetch('/Library/app/ebooks/ebook-view/download.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ filePath: filePath })
    })
    .then(response => response.blob())
    .then(blob => {
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = filePath.split("_")[1];
        document.body.appendChild(a);
        a.click();
        a.remove();
        window.URL.revokeObjectURL(url);
    })
    .catch(error => console.error('Error:', error));
}