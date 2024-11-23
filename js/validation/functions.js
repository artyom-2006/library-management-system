import {currentPageInputs} from "./all-inputs-object.js";

export function validate(objectInput) {
    objectInput.element.addEventListener("blur", () => {
        let isValid;
        // Դաշտերի համար կիրառում ենք trim() մեթոդը բացի գաղտնաբառի դաշտից
        if(objectInput.element.id === "password-input") {
            isValid = objectInput.pattern.test(objectInput.element.value);
        } else {
            isValid = objectInput.pattern.test(objectInput.element.value.trim());
        }

        if(isValid) {
            fieldValueIsValid(objectInput.element, objectInput.isValid);
        } else {
            fieldValueIsNotValid(objectInput);
        }
        checkInputsForError();
    });   

    objectInput.element.addEventListener("focus", () => {
        objectInput.element.style.borderColor = "var(--input-border-color)";
        objectInput.notValidMessageElement.innerText = "";

        const mainButton = document.getElementById("main-button");

        if(!mainButton.classList.contains("disabled")) {
            mainButton.classList.add("disabled");
        }
    });
}

export function fieldValueIsNotValid(objectInput) {
    objectInput.element.style.borderColor = "var(--input-error-border-color)";
    objectInput.notValidMessageElement.innerText = objectInput.notValidMessage;
    objectInput.isValid = false;
}

export function fieldValueIsValid(field, status) {
    field.style.borderColor = "var(--input-success-border-color)";
    status = true;
}

export function checkInputsForError() {
    const mainButton = document.getElementById("main-button");
    const isAllInputsValid = Object.values(currentPageInputs).every(input => 
        (input.notValidMessageElement?.innerText || '') === '' && input.element.value !== ''
    );
        
    if(isAllInputsValid) {
        mainButton.classList.remove("disabled");
        return;
    }
    if(!mainButton.classList.contains("disabled")) {
        mainButton.classList.add("disabled");
    }
}