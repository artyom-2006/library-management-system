<div id="ebook-modal-window">
    <span class="close">&times;</span>
    <h2 class="title">Խմբագրել</h2>
    <form id="update-form" class="ebook-update-form">
        <div id="form-container">
            <div class="left-side">
                <label for="name-input">Գրքի անվանումը</label>
                <input type="text" id="name-input" name="name" autocomplete="off">
                <p id="name-error-message" class="error-message"></p>
                <label for="author-input">Հեղինակը</label>
                <input type="text" id="author-input" name="author" autocomplete="off">
                <p id="author-error-message" class="error-message"></p>
                <label for="edges-input">Էջերի քանակը</label>
                <input type="text" id="edges-input" name="edges" autocomplete="off">
                <p id="edges-error-message" class="error-message"></p>
                <label for="language-input">Լեզուն</label>
                <input type="text" id="language-input" name="language" autocomplete="off">
                <p id="language-error-message" class="error-message"></p>
            </div>
            <div class="right-side">
                <label>Նկարագրություն</label>
                <textarea name="description" id="description-input"></textarea>
                <p id="description-error-message" class="error-message"></p>
            </div>
        </div>
        <button type="submit" id="update-form-button">Պահպանել</button>
    </form>
</div>