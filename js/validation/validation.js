import {currentPageInputs} from "./all-inputs-object.js";
import {validate, fieldValueIsNotValid, fieldValueIsValid, checkInputsForError} from "./functions.js";

for(const key in currentPageInputs) {
    if(currentPageInputs[key].element) {
        validate(currentPageInputs[key]);
    }
}