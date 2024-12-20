export function showMessageModal(heading, message) {
    document.getElementById("layer").classList.add("show");
    document.querySelector("#modal-content .heading").textContent = heading;
    document.querySelector("#modal-content .content").textContent = message;
    document.getElementById("main-modal-button").addEventListener("click", () => {
        document.getElementById("layer").classList.remove("show")
    });
}