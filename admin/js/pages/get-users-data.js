import { storeUsersInTable, deleteUser, editUser, getSingleUserById, storeUserDataWithinModalWindow, showUsersModal, closeModal } from "../../functions/functions.js";

// Get users data and store them in table
fetch('/Library/admin/users/get-users-data.php')
.then((response) => response.json())
.then((response) => {
    storeUsersInTable(response.usersData);
})
.catch((error) => {
    alert("Առաջացել է խնդիր");
});

// Events of closing modal window
document.querySelector("#modal-window .close").addEventListener("click", () => closeModal(document.getElementById("modal-window")));
    
window.onclick = function(event) {
    const modal = document.getElementById("modal-window");
    const layer = document.getElementById("layer");

    if((event.target === modal || event.target === layer) && !modal.contains(event.target)) {
        closeModal(document.getElementById("modal-window"));
    }
}