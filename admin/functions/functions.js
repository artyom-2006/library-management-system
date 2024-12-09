// Dashboards functions
export function getInformationCardsData() {
    fetch('/Library/admin/dashboard/get-dashboards-data.php', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then((response) => response.json())
    .then((response) => {
        if(response.status === 'success') {
            storeInformationCardsData(response.quantities);
        }
    })
    .catch((error) => {
        alert("Առաջացել է խնդիր");
    });
}

export function storeInformationCardsData(cardsData) {
    const cards = {
        usersCardProperties: {
            quantity: document.querySelector("#users-quantity-card .quantity"),
            property: "users"
        },
        ebooksCardProperties: {
            quantity: document.querySelector("#ebooks-quantity-card .quantity"),
            property: "ebooks"
        }/*,
        booksCardProperties: {
            quantity: document.querySelector("#books-quantity-card .quantity")
        }*/
    };

    for(let cardProperties in cards) {
        cards[cardProperties].quantity.innerText = cardsData[cards[cardProperties].property];
    }
}

// Users functions
export function storeUsersInTable(users) {
    const usersTableBody = document.querySelector("#users-table tbody");
    const userProperties = ["user_id", "name", "surname", "phone_number", "email_address", "registration_date"];

    users.forEach((user) => {
        const row = document.createElement("tr");

        for(let i = 0; i < 6; i++) {
            let cell = document.createElement("td");
            cell.innerText = user[userProperties[i]];
            row.append(cell);
        }

        const editButtonCell = document.createElement("td");
        editButtonCell.classList.add("button-cell");
        const editButton = document.createElement("button");
        editButton.innerText = "Խմբագրել";
        editButton.classList.add("edit-button");
        editButton.addEventListener("click", () => editUser(user.user_id));
        editButtonCell.append(editButton);

        const deleteButtonCell = document.createElement("td");
        deleteButtonCell.classList.add("button-cell");
        const deleteButton = document.createElement("button");
        deleteButton.innerText = "Ջնջել";
        deleteButton.classList.add("delete-button");
        deleteButton.addEventListener("click", () => deleteUser(user.user_id, row));
        deleteButtonCell.append(deleteButton);

        row.append(editButtonCell, deleteButtonCell);

        usersTableBody.append(row);
    }); 
}

export function deleteUser(userId, row) {
    if(confirm("Դուք ցանկանո՞ւմ եք ջնջել տվյալ օգտատիրոջը")) {
        fetch(`/Library/admin/users/delete-user.php?id=${userId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then((response) => response.json())
        .then((response) => {
            if(response.status === "success") {
                row.remove();
            } else {
                alert("Առաջացել է խնդիր");
            }
        })
        .catch((error) => {
            alert("Առաջացել է խնդիր");
        });
    }
}

export function editUser(userId) {
    const fields = [
        { label: "Անուն", type: "text", id: "name-input", name: "name" },
        { label: "Ազգանուն", type: "text", id: "surname-input", name: "surname" },
        { label: "Հեռախոս", type: "text", id: "phone-input", name: "phone" },
        { label: "Էլ․ հասցե", type: "text", id: "email-input", name: "email" }
    ];

    showUsersModal(userId, "Խմբագրել", fields, "Պահպանել");
    getSingleUserById(userId);
}

export function getSingleUserById(userId) {
    fetch('/Library/admin/users/get-single-user.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id: userId })
    })
    .then((response) => response.json())
    .then((response) => {
        storeUserDataWithinModalWindow(response.userData);
    })
    .catch((error) => {
        alert("Առաջացել է խնդիր");
    });
}

export function storeUserDataWithinModalWindow(userData) {
    document.getElementById("name-input").value = userData.name;
    document.getElementById("surname-input").value = userData.surname;
    document.getElementById("phone-input").value = userData.phone_number;
    document.getElementById("email-input").value = userData.email_address;
}

export function saveUserDataChanges(userId, fields) {
    const changedData = {
        name: document.getElementById(fields[0].id).value,
        surname: document.getElementById(fields[1].id).value,
        phone: document.getElementById(fields[2].id).value,
        email: document.getElementById(fields[3].id).value
    };

    fetch(`/Library/admin/users/update-user.php?id=${userId}`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(changedData)
    })
    .catch((error) => {
        alert(error);
    });
}

export function showUsersModal(userId, title, fields, buttonText) {
    document.getElementById("layer").classList.add("show");

    const modalWindow = document.getElementById("modal-window")
    const modalWindowTitle = document.querySelector("#modal-window .title");
    const modalWindowForm = document.getElementById("update-form");
    const modalWindowFormButton = document.getElementById("update-form-button");

    modalWindow.classList.remove("hide");
    modalWindow.classList.add("show");
    modalWindow.style.display = "block";
    modalWindowTitle.innerText = title;

    fields.forEach((field) => {
        let label = document.createElement("label");
        label.innerText = field.label;
        label.setAttribute("for", field.id);

        let input = document.createElement("input");
        input.type = field.type;
        input.id = field.id;
        input.name = field.name;
        input.autocomplete = "off";

        modalWindowFormButton.before(label, input);
    });

    modalWindowFormButton.innerText = buttonText;

    // Saving user's data changes when form submitted
    modalWindowForm.addEventListener("submit", () => saveUserDataChanges(userId, fields));
}

export function closeModal(modalWindow) {    
    modalWindow.classList.add("hide");
    modalWindow.classList.remove("show");

    setTimeout(() => {
        document.getElementById("layer").classList.remove("show");
        modalWindow.style.display = "none";
        
        const form = document.getElementById("update-form");
        const button = document.getElementById("update-form-button");
  
        Array.from(form.children).forEach(child => {
            if(child !== button) {
                form.removeChild(child);
            }
        });
    }, 400);
}

// Ebooks functions
export function storeEbooksInTable(ebooks) {
    const ebooksTableBody = document.querySelector("#ebooks-table .ebook-body");
    const ebookProperties = ["ebook_id", "name", "author", "edges", "language", "size", "description", "added_at"];

    ebooks.forEach((ebook) => {
        const row = document.createElement("tr");

        for(let i = 0; i < 8; i++) {
            let cell = document.createElement("td");
            cell.innerText = ebook[ebookProperties[i]];
            if(i === 5) {
                cell.innerText = ebook[ebookProperties[i]] + " մբ";
            }
            if(i === 6) {
                cell.classList.add("description");
            }
            row.append(cell);
        }

        const editButtonCell = document.createElement("td");
        editButtonCell.classList.add("button-cell");
        const editButton = document.createElement("button");
        editButton.innerText = "Խմբագրել";
        editButton.classList.add("edit-button");
        editButton.addEventListener("click", () => editEbook(ebook.ebook_id));
        editButtonCell.append(editButton);

        const deleteButtonCell = document.createElement("td");
        deleteButtonCell.classList.add("button-cell");
        const deleteButton = document.createElement("button");
        deleteButton.innerText = "Ջնջել";
        deleteButton.classList.add("delete-button");
        deleteButton.addEventListener("click", () => deleteEbook(ebook.ebook_id, row));
        deleteButtonCell.append(deleteButton);

        row.append(editButtonCell, deleteButtonCell);

        ebooksTableBody.append(row);
    });    
}

export function deleteEbook(ebookId, row) {
    if(confirm("Դուք ցանկանո՞ւմ եք ջնջել տվյալ գիրքը")) {
        fetch(`/Library/admin/ebooks/ebooks-list/delete-ebook.php?id=${ebookId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then((response) => response.json())
        .then((response) => {
            if(response.status === 'success') {
                row.remove();
            } else {
                alert("Առաջացել է խնդիր");
            }
        })
        .catch((error) => {
            alert(error);
        });
    }
}

export function editEbook(ebookId) {
    showEbookModal(ebookId);
    getSingleEbookById(ebookId);
}

export function getSingleEbookById(ebookId) {
    fetch(`/Library/admin/ebooks/ebooks-list/get-single-ebook.php?id=${ebookId}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then((response) => response.json())
    .then((response) => {
        storeEbookDataWithinModalWindow(response.ebookData);
    })
    .catch((error) => {
        alert("Առաջացել է խնդիր");
    });
}

export function storeEbookDataWithinModalWindow(ebookData) {
    document.getElementById("name-input").value = ebookData.name;
    document.getElementById("author-input").value = ebookData.author;
    document.getElementById("edges-input").value = ebookData.edges;
    document.getElementById("language-input").value = ebookData.language;
    document.getElementById("description-input").value = ebookData.description;
}

export function saveEbookDataChanges(ebookId) {
    const changedData = {
        name: document.getElementById("name-input").value,
        author: document.getElementById("author-input").value,
        edges: document.getElementById("edges-input").value,
        language: document.getElementById("language-input").value,
        description: document.getElementById("description-input").value
    }

    fetch(`/Library/admin/ebooks/ebooks-list/update-ebook.php?id=${ebookId}`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(changedData)
    })
    .catch((error) => {
        alert("Առաջացել է խնդիր");
    });
}

export function showEbookModal(ebookId) {
    document.getElementById("layer").classList.add("show");

    const modalWindow = document.getElementById("ebook-modal-window");
    const modalWindowForm = document.getElementById("update-form");

    modalWindow.classList.remove("hide");
    modalWindow.classList.add("show");
    modalWindow.style.display = "block";

    // Saving ebook's data changes when form submitted
    modalWindowForm.addEventListener("submit", () => {
        saveEbookDataChanges(ebookId);
    });
}

export function closeEbookModal() {
    const modalWindow = document.getElementById("ebook-modal-window");

    modalWindow.classList.add("hide");
    modalWindow.classList.remove("show");

    setTimeout(() => {
        document.getElementById("layer").classList.remove("show");
        modalWindow.style.display = "none";
        
        const form = document.getElementById("update-form");
        const button = document.getElementById("update-form-button");
    }, 400);
}

// Functions for genres
export function getGenresData(type) {
    let url = "";
    if(type === "ebook") {
        url = "/Library/admin/ebooks/genres-list/get-ebooks-genres.php";
    } else if(type === "pbook") {
        url = "/Library/admin/pbooks/genres-list/get-pbooks-genres.php";
    }

    fetch(url, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then((response) => response.json())
    .then((response) => {
        if(response.status === "success") {
            if(type === "ebook") {
                storeGenresDataWithinTable(response.genresData, "ebook");
            } else if(type === "pbook") {
                storeGenresDataWithinTable(response.genresData, "pbook");
            }
        }
    })
    .catch((error) => {
        alert("Առաջացել է խնդիր");
    });
}

function storeGenresDataWithinTable(genres, genresType) {
    const genresTableBody = document.querySelector("#genres-table tbody");
    const genresProperties = ["genre_id", "genre_name", "created_at"];
    
    genres.forEach((genre) => {
        const row = document.createElement("tr");

        for(let i = 0; i < 3; i++) {
            let cell = document.createElement("td");
            cell.innerText = genre[genresProperties[i]];
            row.append(cell);
        }

        const editButtonCell = document.createElement("td");
        editButtonCell.classList.add("button-cell");
        const editButton = document.createElement("button");
        editButton.innerText = "Խմբագրել";
        editButton.classList.add("edit-button");
        editButton.addEventListener("click", () => editGenre(genre.genre_id, genresType));
        editButtonCell.append(editButton);

        const deleteButtonCell = document.createElement("td");
        deleteButtonCell.classList.add("button-cell");
        const deleteButton = document.createElement("button");
        deleteButton.innerText = "Ջնջել";
        deleteButton.classList.add("delete-button");
        deleteButton.addEventListener("click", () => deleteGenre(genre.genre_id, genresType, row));
        deleteButtonCell.append(deleteButton);

        row.append(editButtonCell, deleteButtonCell);

        genresTableBody.append(row);
    }); 
}

function deleteGenre(genreId, genreType, row) {
    if(confirm("Դուք ցանկանո՞ւմ եք ջնջել տվյալ ժանրը")) {
        fetch(`/Library/admin/handlers/delete-genre.php?id=${genreId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ genreType: genreType })
        })
        .then((response) => response.json())
        .then((response) => {
            if(response.status === 'success') {
                row.remove();
            } else {
                alert("Առաջացել է խնդիր");
            }
        })
        .catch((error) => {
            alert("Առաջացել է խնդիր");
            console.log(error)
        });
    }
}

function editGenre(genreId, genreType) {
    showGenresModal(genreId);
    getSingleGenreById(genreId, genreType);
}

function getSingleGenreById(genreId, genreType) {
    fetch(`/Library/admin/handlers/get-single-genre.php?id=${genreId}&type=${genreType}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then((response) => response.json())
    .then((response) => {
        if(response.status === "success") {
            document.getElementById("name-input").value = response.genreData.genre_name;
        }
    })
    .catch((error) => {
        alert("Առաջացել է խնդիր");
    });
}

export function getAllGenres(genreType) {
    fetch(`/Library/admin/handlers/get-all-genres.php?type=${genreType}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then((response) => response.json())
    .then((response) => {
        if(response.status === "success") {
            showGenresAsList(response.genresData);
        }
    })
    .catch((error) => {
        alert("Առաջացել է խնդիր");
        console.log(error)
    });
}

function showGenresAsList(genresData) {
    const genresSection = document.querySelector("#add-ebook-form .first-part .right-side");

    genresData.forEach(genre => {
        let row = document.createElement("label");
        row.classList.add("section-row");
        row.textContent = genre.genre_name;

        let chechkbox = document.createElement("input");
        chechkbox.type = "checkbox";
        chechkbox.name = "genre";
        chechkbox.value = genre.genre_id;

        row.prepend(chechkbox);

        genresSection.append(row);
    });
}

function showGenresModal(genreId) {
    document.getElementById("layer").classList.add("show");

    const modalWindow = document.getElementById("modal-window");
    const modalWindowForm = document.getElementById("update-form");

    modalWindow.classList.remove("hide");
    modalWindow.classList.add("show");
    modalWindow.style.display = "block";

    // Saving ebook's data changes when form submitted
    modalWindowForm.addEventListener("submit", () => {
        saveGenreDataChanges(genreId);
    });
}

function saveGenreDataChanges(genreId, genreType) {
    const changedData = {
        name: document.getElementById("name-input").value
    }

    fetch(`/Library/admin/handlers/update-genre.php?id=${genreId}&type=${genreType}`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(changedData)
    })
    .catch((error) => {
        alert("Առաջացել է խնդիր");
    });
}

export function closeGenresModal() {
    const modalWindow = document.getElementById("modal-window");

    modalWindow.classList.add("hide");
    modalWindow.classList.remove("show");

    setTimeout(() => {
        document.getElementById("layer").classList.remove("show");
        modalWindow.style.display = "none";
    }, 400);
}

// Functions for files
export function getFileSizeInMB(file) {
    const bytes = file.size;
    const megabytes = bytes / (1024 * 1024);
    return parseFloat(megabytes.toFixed(1));
}

export function isPDF(file) {
    if(!(file instanceof File)) {
        return false;
    }
    return file.type === "application/pdf";
}

export function isValidImage(file) {
    if(!(file instanceof File)) {
        return false;
    }
    const allowedMimeTypes = ["image/jpeg", "image/png", "image/webp", "image/svg+xml"];

    return allowedMimeTypes.includes(file.type);
}