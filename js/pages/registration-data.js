const modalHeading = document.querySelector("#modal-content .heading");
const modalContent = document.querySelector("#modal-content .content");
const modalButtons = document.getElementById("modal-buttons");
const registrationForm = document.getElementById("form");

registrationForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const registrationData = {
        name: document.getElementById("name-input").value.trim(),
        surname: document.getElementById("surname-input").value.trim(),
        email: document.getElementById("email-input").value.trim(),
        phone: document.getElementById("phone-input").value.trim(),
        password: document.getElementById("password-input").value
    };

    // Sending data to the back-end with fetch
    fetch('http://localhost/Library/app/sign-up/registration-data.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(registrationData)
    })
    .then((response) => response.json())
    .then((response) => {
        if(response.message === 'User registered successfully') {
            // Clearing data in the form
            registrationForm.reset();
            document.querySelectorAll("#form #input-field input").forEach((input) => input.style.borderColor = "var(--input-border-color)");
            document.getElementById("main-button").classList.add("disabled");

            modalHeading.innerText = "Դուք հաջողությամբ գրանցվել եք";
            modalContent.innerText = "Այժմ կարող եք մուտք գործել կամ վերադառնալ գլխավոր էջ";

            // Adding needed buttons for this modal window
            let secondModalButton = document.createElement("button");
            secondModalButton.setAttribute("id", "second-modal-button");
            secondModalButton.innerText = "Գլխավոր էջ";
            secondModalButton.addEventListener("click", () => window.location.href = "../../");
            let mainModalButton = document.createElement("button");
            mainModalButton.setAttribute("id", "main-modal-button");
            mainModalButton.innerText = "Մուտք";
            mainModalButton.addEventListener("click", () => window.location.href = "../log-in/");

            modalButtons.append(secondModalButton, mainModalButton);
        } else if(response.message === 'Email already exists') {
            modalHeading.innerText = "Տվյալների սխալ";
            modalContent.innerText = "Նշված էլ․ հասցեն արդեն կիրառվել է այլ օգտատիրոջ կողմից, փորձեք մեկ այլ էլ․ հասցե";

            // Adding needed button for this modal window
            let mainModalButton = document.createElement("button");
            mainModalButton.setAttribute("id", "main-modal-button");
            mainModalButton.innerText = "Լավ";
            mainModalButton.addEventListener("click", hideModal);

            modalButtons.append(mainModalButton);
        } else if(response.message === 'Phone number already exists') {
            modalHeading.innerText = "Տվյալների սխալ";
            modalContent.innerText = "Նշված հեռախոսահամարը արդեն կիրառվել է այլ օգտատիրոջ կողմից, փորձեք մեկ այլ հեռախոսահամար";

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