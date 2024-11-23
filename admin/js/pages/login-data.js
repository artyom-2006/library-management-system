const loginForm = document.getElementById("login-form");
const errorMessage = document.querySelector(".error-message");

loginForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const loginData = {
        username: document.getElementById("username-input").value.trim(),
        password: document.getElementById("password-input").value
    };

    fetch('/Library/admin/login/log-in-data.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(loginData)
    })
    .then((response) => response.json())
    .then((response) => {
        if(response.status === "success") {
            window.location.href = "../dashboard/";

            // Cleaning data in the form
            loginForm.reset();
            document.querySelector("#login-form .error-message").innerText = "";
        } else if(response.status === "error") {
            errorMessage.innerText = "Սխալ մուտքային տվյալներ";
        }
    })
    .catch((error) => {
        errorMessage.innerText = "Առաջացել է խնդիր, փորձեք կրկին";
    });
});