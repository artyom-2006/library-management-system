window.addEventListener("load", () => {
    document.querySelector("#loader-wrapper").style.transition = "opacity 0.5s";
    document.querySelector("#loader-wrapper").style.opacity = "0";
    
    setTimeout(() => document.querySelector("#loader-wrapper").style.display = "none", 500);
});