const modalHeading = document.querySelector("#modal-content .heading");
const modalContent = document.querySelector("#modal-content .content");
const modalButtons = document.getElementById("modal-buttons");
const verifyOtpForm = document.getElementById("form");

verifyOtpForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const otpData = {
        otp: document.getElementById("otp-input").value.trim()
    };

    // Sending data to the back-end with fetch
    fetch('http://localhost/Library/app/forgot-password/verify-code/verify-code.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(otpData)
    })
    .then((response) => response.json())
    .then((response) => {
        if(response.status === "success") {
            window.location.href = "../reset-password/";
        } else if(response.message === "Invalid OTP") {
            modalHeading.innerText = "Տվյալների սխալ";
            modalContent.innerText = "Մեկանգամյա օգտագործման գաղտնաբառը սխալ է, փորձեք կրկին";

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