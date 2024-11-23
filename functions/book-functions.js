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
        let seeEbookButton = document.createElement("button");
        seeEbookButton.type = "button";
        seeEbookButton.innerText = "Տեսնել գիրքը";
        //seeEbookButton.addEventListener("click", () => seeEbook(ebook.ebook_id));

        infoBlock.append(ebookName, ebookAuthor, seeEbookButton);
        ebookCard.append(imageBlock, infoBlock);
        ebooksList.appendChild(ebookCard);
    });

    mainSection.append(ebooksList);
}

export function setNoBooksView() {
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