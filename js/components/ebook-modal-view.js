const modalWindow = document.getElementById("modal-window");
const ebooksCovers = document.querySelectorAll("#ebook-card .img-block");

ebooksCovers.forEach((ebook) => ebook.addEventListener("click", showModal));

document.addEventListener("mouseup", (event) => {
    if(!modalWindow.contains(event.target) && layer.classList.contains("show")) {
        hideModal();
    }
});

function showModal() {
    layer.classList.add("show");
}

function hideModal() {
    layer.classList.remove("show");
}