import { getGenresData, closeGenresModal } from "../../functions/functions.js";

getGenresData("ebook");

// Events of closing modal window
document.querySelector("#modal-window .close").addEventListener("click", () => closeGenresModal());
    
window.onclick = function(event) {
    const modal = document.getElementById("modal-window");
    const layer = document.getElementById("layer");

    if((event.target === modal || event.target === layer) && !modal.contains(event.target)) {
        closeGenresModal();
    }
}