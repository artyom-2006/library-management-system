const logOutButton = document.querySelector("header .log-out");

logOutButton.addEventListener("click", () => {
    fetch("/Library/admin/dashboard/log-out.php")
    .then((response) => {
        if(response.ok) {
            window.location.href = "/Library/admin/login/";
        }
    })
    .catch((error) => {
        alert("Առաջացել է խնդիր");
    });
});