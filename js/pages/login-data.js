const modalHeading = document.querySelector("#modal-content .heading");
const modalContent = document.querySelector("#modal-content .content");
const modalButtons = document.getElementById("modal-buttons");
const loginForm = document.getElementById("form");

loginForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const loginData = {
        email: document.getElementById("email-input").value.trim(),
        password: document.getElementById("password-input").value
    };

    // Sending data to the back-end with fetch
    fetch('http://localhost/Library/app/log-in/login-process.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(loginData)
    })
    .then((response) => response.json())
    .then((response) => {
        if(response.status === "success") {
            window.location.href = "../general/";

            // Clearing data in the form
            loginForm.reset();
            document.querySelectorAll("#form #input-field input").forEach((input) => input.style.borderColor = "var(--input-border-color)");
            document.getElementById("main-button").classList.add("disabled");
        } else if(response.message === "Invalid email") {      
            modalHeading.innerText = "Տվյալների սխալ";
            modalContent.innerText = "Տվյալ էլ․ հասցեով օգտատեր գոյություն չունի";

            // Adding needed button for this modal window
            let mainModalButton = document.createElement("button");
            mainModalButton.setAttribute("id", "main-modal-button");
            mainModalButton.innerText = "Լավ";
            mainModalButton.addEventListener("click", hideModal);

            modalButtons.append(mainModalButton);

            showModal();
        } else if(response.message === "Invalid password") {            
            modalHeading.innerText = "Տվյալների սխալ";
            modalContent.innerText = "Գաղտնաբառը սխալ է, փորձեք մեկ այլ գաղտնաբառ կամ վերականգնեք այն եթե մոռացել եք";

            // Adding needed button for this modal window
            let mainModalButton = document.createElement("button");
            mainModalButton.setAttribute("id", "main-modal-button");
            mainModalButton.innerText = "Լավ";
            mainModalButton.addEventListener("click", hideModal);

            modalButtons.append(mainModalButton);

            showModal();
        }
    })
    .catch((error) => {
        modalHeading.innerText = "Սխալ";
        modalContent.innerText = "Առաջացել է սխալ, խնդրում ենք փորձել կրկին";

        // Adding needed button for this modal window
        let mainModalButton = document.createElement("button");
        mainModalButton.setAttribute("id", "main-modal-button");
        mainModalButton.innerText = "Լավ";
        mainModalButton.addEventListener("click", hideModal);

        modalButtons.append(mainModalButton);

        showModal();
    });
});