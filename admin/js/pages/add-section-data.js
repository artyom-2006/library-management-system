const sectionForm = document.getElementById("add-genre-form");

sectionForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const sectionData = {
        name: document.getElementById("name-input").value.trim()
    };
    

    // Validation
    if(!sectionData.name) {
        document.getElementById("name-error-message").style.display = "block";
        document.getElementById("name-error-message").innerText = "Խնդրում ենք լրացնել դաշտը";
        return;
    }

    // Sending section data to the server
    fetch("/Library/admin/ebooks/add-genre/add-genre.php", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(sectionData)
    })
    .then((response) => response.json())
    .then((response) => {
        if(response.status === "success") {
            alert("Բաժինը հաջողությամբ ավելացվել է");

            // Clearing the form
            document.getElementById("add-genre-form").reset();
        }
    })
    .catch((error) => {
        alert("Առաջացել է խնդիր");
    });
});