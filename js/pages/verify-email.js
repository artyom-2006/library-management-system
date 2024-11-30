const modalHeading = document.querySelector("#modal-content .heading");
const modalContent = document.querySelector("#modal-content .content");
const modalButtons = document.getElementById("modal-buttons");
const verifyEmailForm = document.getElementById("form");

verifyEmailForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const emailData = {
        email: document.getElementById("email-input").value.trim()
    };

    // Sending data to the back-end with fetch
    fetch('/Library/app/forgot-password/verify-email/verify-email.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(emailData)
    })
    .then((response) => response.json())
    .then((response) => {
        if(response.status === "success") {
            window.location.href = "../verify-code/";
        } else if(response.status === "error") {
            modalHeading.innerText = "Տվյալների սխալ";
            modalContent.innerText = "Տվյալ էլ․ հասցեով օգտատեր գոյություն չունի";

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