import { storeEbooksInTable, deleteEbook, editEbook, showEbookModal, closeEbookModal } from "../../functions/functions.js";

// Get users data and store them in table
fetch('/Library/admin/ebooks/ebooks-list/get-ebooks-data.php')
.then((response) => response.json())
.then((response) => {
    storeEbooksInTable(response.ebooksData);
})
.catch((error) => {
    alert("Առաջացել է խնդիր");
});

// Events of closing modal window
document.querySelector("#ebook-modal-window .close").addEventListener("click", () => closeEbookModal());
    
window.onclick = function(event) {
    const modal = document.getElementById("ebook-modal-window");
    const layer = document.getElementById("layer");

    if((event.target === modal || event.target === layer) && !modal.contains(event.target)) {
        closeEbookModal();
    }
}