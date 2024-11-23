let pathParts = window.location.pathname.split('/');
let currentFolder = pathParts[pathParts.length - 2];
let currentPageInputs = {}, allInputs = {
    nameInput: {
        element: document.getElementById("name-input"),
        pattern: /^[A-Za-z\u0531-\u0556\u0561-\u0587\u0410-\u042F\u0430-\u044F\s]+$/,
        notValidMessage: "Միայն տառեր և բացատներ",
        notValidMessageElement: document.getElementById("name-not-valid-message")
    },
    surnameInput: {
        element: document.getElementById("surname-input"),
        pattern: /^[A-Za-z\u0531-\u0556\u0561-\u0587\u0410-\u042F\u0430-\u044F\s]+$/,
        notValidMessage: "Միայն տառեր և բացատներ",
        notValidMessageElement: document.getElementById("surname-not-valid-message")
    },
    emailInput: {
        element: document.getElementById("email-input"),
        pattern: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
        notValidMessage: "Էլ․ հասցեի ձևաչափը ճիշտ չէ",
        notValidMessageElement: document.getElementById("email-not-valid-message")
    },
    phoneInput: {
        element: document.getElementById("phone-input"),
        pattern: /^(\+374|0)\s?(\d{2})\s?\d{3}\s?\d{3}$/,
        notValidMessage: "Հեռ. համարը պետք է լինի հայկական տարբերակով",
        notValidMessageElement: document.getElementById("phone-not-valid-message")
    },
    passwordInput: {
        element: document.getElementById("password-input"),
        pattern: /^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*()_+={}\[\]:;"'<>,.?\/\\|`~\-]).{8,}$/,
        notValidMessage: "Գաղտնաբառը պետք է պարունակի առնվազն 8 նիշ, 1 մեծատառ, 1 փոքրատառ, 1 թիվ և 1 հատուկ սիմվոլ",
        notValidMessageElement: document.getElementById("password-not-valid-message")
    },
    oneTimePasswordInput: {
        element: document.getElementById("otp-input"),
        pattern: /^\d{6}$/,
        notValidMessage: "Գաղտնաբառը կազմված է վեց թվանշանից",
        notValidMessageElement: document.getElementById("otp-not-valid-message")
    }
};

if(currentFolder === "sign-up") {
    currentPageInputs = {
        nameInput: allInputs.nameInput,
        surnameInput: allInputs.surnameInput,
        emailInput: allInputs.emailInput,
        phoneInput: allInputs.phoneInput,
        passwordInput: allInputs.passwordInput
    };
} else if(currentFolder === "log-in") {
    currentPageInputs = {
        emailInput: allInputs.emailInput,
        passwordInput: allInputs.passwordInput
    };
} else if(currentFolder === "verify-email") {
    currentPageInputs = {
        emailInput: allInputs.emailInput
    };
} else if(currentFolder === "verify-code") {
    currentPageInputs = {
        oneTimePasswordInput: allInputs.oneTimePasswordInput
    };
} else if(currentFolder === "reset-password") {
    currentPageInputs = {
        passwordInput: allInputs.passwordInput
    };
}

export {currentPageInputs};