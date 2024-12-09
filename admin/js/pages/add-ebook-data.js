import { getAllGenres, getFileSizeInMB, isPDF, isValidImage } from "../../functions/functions.js";

getAllGenres("ebook");

const ebookForm = document.getElementById("add-ebook-form");

ebookForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const eBookData = {
        name: document.getElementById("name-input").value.trim(),
        author: document.getElementById("author-input").value.trim(),
        edges: +document.getElementById("edges-input").value.trim(),
        language: document.getElementById("language-input").value.trim(),
        description: document.getElementById("description-input").value.trim(),
        file: document.getElementById("file-input").files[0],
        cover: document.getElementById("cover-input").files[0]
    };
    const checkboxes = document.querySelectorAll('input[name="genre"]:checked');
    const selectedGenres = Array.from(checkboxes).map(checkbox => checkbox.value);
    
    // Validation
    const textDataInputs = ["name", "author", "edges", "language", "description"];
    const textDataInputsErrors = ["name-error-message", "author-error-message", "edges-error-message", "language-error-message", "description-error-message"];
    const fileErrorMessage = document.getElementById("file-error-message");
    const coverErrorMessage = document.getElementById("cover-error-message");

    let isAllDataValid = true;
    // Checking if fields are empty or not
    for(let i = 0; i < textDataInputs.length; i++) {
        if(!eBookData[textDataInputs[i]]) {
            document.getElementById(textDataInputsErrors[i]).style.display = "block";
            document.getElementById(textDataInputsErrors[i]).innerText = "Խնդրում ենք լրացնել դաշտը";
            isAllDataValid = false;
        } else {
            document.getElementById(textDataInputsErrors[i]).style.display = "none";
            document.getElementById(textDataInputsErrors[i]).innerText = "";
        }
    }

    // Checking is file loaded, have valid size and is pdf or not
    if(!eBookData.file) {
        fileErrorMessage.style.display = "block";
        fileErrorMessage.innerText = "Խնդրում ենք ընտրել ֆայլը";
        isAllDataValid = false;
    } else if(!isPDF(eBookData.file)) {
        fileErrorMessage.style.display = "block";
        fileErrorMessage.innerText = "Ֆայլը պետք է լինի միայն PDF տարբերակով";
        isAllDataValid = false;
    } else if(getFileSizeInMB(eBookData.file) > 50) {
        fileErrorMessage.style.display = "block";
        fileErrorMessage.innerText = "Ֆայլի ծավալը չպետք է գերազանցի 50 մեգաբայթը";
        isAllDataValid = false;
    } else {
        fileErrorMessage.style.display = "none";
        fileErrorMessage.innerText = "";
    }

    // Checking is cover image loaded, have valid size and have valid format(jpg/jpeg, png, webp, svg)
    if(!eBookData.cover) {
        coverErrorMessage.style.display = "block";
        coverErrorMessage.innerText = "Խնդրում ենք ընտրել ֆայլը";
        isAllDataValid = false;
    } else if(!isValidImage(eBookData.cover)) {
        coverErrorMessage.style.display = "block";
        coverErrorMessage.innerText = "Ֆայլը պետք է լինի միայն JPG/JPEG, PNG, WEBP, SVG տարբերակներով";
        isAllDataValid = false;
    } else if(getFileSizeInMB(eBookData.cover) > 2) {
        coverErrorMessage.style.display = "block";
        coverErrorMessage.innerText = "Նկարի ծավալը չպետք է գերազանցի 2 մեգաբայթը";
        isAllDataValid = false;
    } else {
        coverErrorMessage.style.display = "none";
        coverErrorMessage.innerText = "";
    }

    // Collecting data into FormData object and sending it to the server
    if(isAllDataValid) {
        const eBookReadyData = new FormData();

        for(let key in eBookData) {
            if(eBookData.hasOwnProperty(key)) {
                eBookReadyData.append(key, eBookData[key]);
            }
        }

        eBookReadyData.append("fileSize", getFileSizeInMB(eBookData.file));
        eBookReadyData.append("selectedGenres", selectedGenres);

        fetch('/Library/admin/ebooks/add-ebook/upload.php', {
            method: "POST",
            body: eBookReadyData
        })
        .then((response) => response.json())
        .then((response) => {
            if(response.status === "success") {
                alert("Էլեկտրոնային գիրքը հաջողությամբ ավելացվել է");

                // Clearing the form
                document.getElementById("add-ebook-form").reset();
                console.log(response);
            }
        })
        .catch((error) => {
            alert("Առաջացել է խնդիր");
        });
    }
});