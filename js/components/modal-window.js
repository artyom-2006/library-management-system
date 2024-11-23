const layer = document.getElementById("layer");
const modalWindow = document.getElementById("modal-window");

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
    
    /* Հեռացնում ենք մոդալ պատուհանում ավելացված կոճակները */
    setTimeout(() => {
        document.querySelectorAll("#modal-buttons button").forEach((button) => button.remove());
    }, 500);
}

function redirect(path) {
    window.location.href = path;
}