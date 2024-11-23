document.querySelectorAll('#main-button.disabled').forEach(button => {
    button.addEventListener('click', function(event) {
        if (this.classList.contains('disabled')) {
            event.preventDefault();
            event.stopPropagation();
            return false;
        }
    });
});