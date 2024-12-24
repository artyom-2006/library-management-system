import { storePostsInTable } from "../../functions/blog-functions.js";

// Get users data and store them in table
fetch('/Library/admin/blog/posts-list/get-posts-data.php')
.then((response) => response.json())
.then((response) => {
    storePostsInTable(response.postsData);
})
.catch((error) => {
    alert("Առաջացել է խնդիր");
    console.log(error)
});

// Events of closing modal window
// TODO: erb avelacnenq modal-y sa veranayel u bacel
/*
document.querySelector("#ebook-modal-window .close").addEventListener("click", () => closeEbookModal());
    
window.onclick = function(event) {
    const modal = document.getElementById("ebook-modal-window");
    const layer = document.getElementById("layer");

    if((event.target === modal || event.target === layer) && !modal.contains(event.target)) {
        closeEbookModal();
    }
}
*/