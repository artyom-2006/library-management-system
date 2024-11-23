const modalHeading = document.querySelector("#modal-content .heading");
const modalContent = document.querySelector("#modal-content .content");
const modalButtons = document.getElementById("modal-buttons");
const resetPasswordForm = document.getElementById("form");

resetPasswordForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const newPasswordData = {
        password: document.getElementById("password-input").value.trim()
    };

    // Sending data to the back-end with fetch
    fetch('http://localhost/Library/app/forgot-password/reset-password/reset-password.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(newPasswordData)
    })
    .then((response) => response.json())
    .then((response) => {
        if(response.status === "success") {
            // Clearing data in the form
            resetPasswordForm.reset();
            document.getElementById("password-input").style.borderColor = "var(--input-border-color)";
            document.getElementById("main-button").classList.add("disabled");

            modalHeading.innerText = "Գաղտնաբառը հաջողությամբ փոփոխվել է";
            modalContent.innerText = "Կարող եք մուտք գործել ձեր հաշիվ կամ վերադաձնալ գլխավոր էջ";

            // Adding needed buttons for this modal window
            let secondModalButton = document.createElement("button");
            secondModalButton.setAttribute("id", "second-modal-button");
            secondModalButton.innerText = "Գլխավոր էջ";
            secondModalButton.addEventListener("click", () => window.location.href = "../../general/");
            let mainModalButton = document.createElement("button");
            mainModalButton.setAttribute("id", "main-modal-button");
            mainModalButton.innerText = "Մուտք";
            mainModalButton.addEventListener("click", () => window.location.href = "../../log-in/");

            modalButtons.append(secondModalButton, mainModalButton);
        } else if(response.status === "error") {
            modalHeading.innerText = "Գաղտնաբառի փոփոխման սխալ";
            modalContent.innerText = "Գաղտնաբառը արդեն փոփոխվել է, եթե ցանկանում եք կրկին փոփոխել, պետք է նորից հաստատեք ձեր էլ․ հասցեն";

            // Adding needed button for this modal window
            let mainModalButton = document.createElement("button");
            mainModalButton.setAttribute("id", "main-modal-button");
            mainModalButton.innerText = "Լավ";
            mainModalButton.addEventListener("click", hideModal);

            modalButtons.append(mainModalButton);
        }

        showModal();
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