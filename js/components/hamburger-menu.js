const hamburgerButton = document.getElementById("hamburger");
const navigation = document.getElementById("navigation");
const layer = document.getElementById("layer");

hamburgerButton.addEventListener("click", () => {
    navigation.classList.toggle("active");
    layer.classList.toggle("show");
});

document.addEventListener("mouseup", (event) => {
    if (!navigation.contains(event.target) && layer.classList.contains("show")) {
        navigation.classList.remove("active");
        layer.classList.remove("show");
    }
});