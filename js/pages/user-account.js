import { currentPageInputs } from "../validation/all-inputs-object.js";

// TODO: currentPageObject objecti mijocov avelacnel validation dashteri hamar, validacian lini admin paneli validation-i nman

fetch("/Library/app/account/get-user-data.php", {
    method: 'GET',
    headers: {
        'Content-Type': 'application/json'
    }
})
.then(response => response.json())
.then(response => {
    if(response.status === "success") {
        renderUser(response.userData);
    }
})
.catch(error => console.error(error));

// Save data changes functionality
const userDataForm = document.getElementById("form");

userDataForm.addEventListener("submit", () => {
    const userData = {
        name: currentPageInputs.nameInput.element.value,
        surname: currentPageInputs.surnameInput.element.value,
        phone: currentPageInputs.phoneInput.element.value
    };

    saveUserDataChanges(userData);
});

// Log out functionality
const logOutButton = document.getElementById("text-button");

logOutButton.addEventListener("click", () => {
    fetch("/Library/app/account/log-out.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(response => {
        if(response.status === "success") {
            window.location.href = "/Library/app/general/";
        }
    })
    .catch(error => console.error(error));
});

// Functions
function renderUser(userData) {
    currentPageInputs.nameInput.element.value = userData.name;
    currentPageInputs.surnameInput.element.value = userData.surname;
    currentPageInputs.phoneInput.element.value = userData.phone_number;
}

function saveUserDataChanges(userData) {
    fetch("/Library/app/account/update-user.php", {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(userData)
    })
    .then(response => response.json())
    .then(response => {
        if(response.status === "success") {
            renderUser(userData);   
        }
    })
    .catch(error => console.error(error));
}