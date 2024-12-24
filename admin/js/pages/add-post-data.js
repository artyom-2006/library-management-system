import { getFileSizeInMB, isValidImage } from "../../functions/functions.js";

const postForm = document.getElementById("add-post-form");

postForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const postData = {
        title: document.getElementById("title-input").value.trim(),
        description: document.getElementById("description-input").value.trim(),
        image: document.getElementById("image-input").files[0]
    };

    // Validation
    const textDataInputs = ["title", "description"];
    const textDataInputsErrors = ["title-error-message", "description-error-message"];
    const imageErrorMessage = document.getElementById("image-error-message");

    let isAllDataValid = true;
    // Checking if fields are empty or not
    for(let i = 0; i < textDataInputs.length; i++) {
        if(!postData[textDataInputs[i]]) {
            document.getElementById(textDataInputsErrors[i]).style.display = "block";
            document.getElementById(textDataInputsErrors[i]).innerText = "Խնդրում ենք լրացնել դաշտը";
            isAllDataValid = false;
        } else {
            document.getElementById(textDataInputsErrors[i]).style.display = "none";
            document.getElementById(textDataInputsErrors[i]).innerText = "";
        }
    }

    // Checking is image loaded, have valid size and have valid format(jpg/jpeg, png, webp, svg)
    if(!postData.image) {
        imageErrorMessage.style.display = "block";
        imageErrorMessage.innerText = "Խնդրում ենք ընտրել նկար";
        isAllDataValid = false;
    } else if(!isValidImage(postData.image)) {
        imageErrorMessage.style.display = "block";
        imageErrorMessage.innerText = "Ֆայլը պետք է լինի միայն JPG/JPEG, PNG, WEBP, SVG տարբերակներով";
        isAllDataValid = false;
    } else if(getFileSizeInMB(postData.image) > 2) {
        imageErrorMessage.style.display = "block";
        imageErrorMessage.innerText = "Նկարի ծավալը չպետք է գերազանցի 2 մեգաբայթը";
        isAllDataValid = false;
    } else {
        imageErrorMessage.style.display = "none";
        imageErrorMessage.innerText = "";
    }

    // Collecting data into FormData object and sending it to the server
    if(isAllDataValid) {
        const postReadyData = new FormData();

        for(let key in postData) {
            if(postData.hasOwnProperty(key)) {
                postReadyData.append(key, postData[key]);
            }
        }

        postReadyData.append("imageSize", getFileSizeInMB(postData.image));

        fetch('/Library/admin/blog/add-post/upload-post.php', {
            method: "POST",
            body: postReadyData
        })
        .then((response) => response.json())
        .then((response) => {
            if(response.status === "success") {
                alert("Գրառումը հաջողությամբ ավելացվել է");

                // Clearing the form
                document.getElementById("add-post-form").reset();
            }
        })
        .catch((error) => {
            alert("Առաջացել է խնդիր");
            console.error(error);
        });
    }
});