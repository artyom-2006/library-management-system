const BASE_URL = '/Library/';

changeTheme();

// Երբ կայքը բեռնվում է՝ localStorage-ից ստանում ենք պահպանված թեման և օգտագործում այն՝ կանչելով applyTheme() ֆունկցիան ստացված արժեքով
window.addEventListener('load', () => {
    const storedTheme = localStorage.getItem('theme') || 'system';
    applyTheme(storedTheme);
});

window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
    if(localStorage.getItem('theme') === 'system') {
        applyTheme('system');
    }
});

// Ֆունկցիայի պարամետրում ստանում ենք արժեք և ըստ դրա որոշվում է թե որ CSS ֆայլն է միացվելու՝ այդպիսով որոշելով կայքի թեման
function applyTheme(theme) {
    const themeStylesheet = document.getElementById('theme-stylesheet');

    if(theme === 'light') {
        themeStylesheet.setAttribute('href', BASE_URL + 'css/variables/light-mode-variables.css');
    } else if(theme === 'dark') {
        themeStylesheet.setAttribute('href', BASE_URL + 'css/variables/dark-mode-variables.css');
    } else {
        themeStylesheet.setAttribute('href', getSystemPreference() === 'dark' ? BASE_URL + 'css/variables/dark-mode-variables.css' : BASE_URL + 'css/variables/light-mode-variables.css');
    }
}

// Ֆունկցիայի միջոցով ստանում ենք ընտրված թեման և այն պահում localStorage-ում և նաև միանգամից ավելացնում ենք այդ թեման
function changeTheme() {
    const selectedTheme = "system";
    localStorage.setItem('theme', selectedTheme);
    applyTheme(selectedTheme);
}

// Ֆունկցիան վերադարձնում է համակարգի(սարքավորման սիստեմային թեման) թեման տվյալ պահին
function getSystemPreference() {
    return window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
}