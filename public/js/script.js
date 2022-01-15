const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="e-mail"]');
const websiteUrl = form.querySelector('input[name="website"]');
const postalCodeInput = form.querySelector('input[name="postal-code"]');
const confirmedPasswordInput = form.querySelector('input[name="confirmed-password"]');
const passwordInput = form.querySelector('input[name="password"]');

function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function isPostalCode(postal) {
    return /\d{2}-\d{3}/.test(postal);
}

function isURL(url) {
    return /[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)/.test(url);
}

function arePasswordsSame(password, confirmedPassword) {
    return password === confirmedPassword;
}

function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function validatePostalCode() {
    setTimeout(function () {
            markValidation(postalCodeInput, isPostalCode(postalCodeInput.value));
        },
        500
    );
}

function validateEmail() {
    setTimeout(function () {
            markValidation(emailInput, isEmail(emailInput.value));
        },
        500
    );
}

function validateUrl() {
    setTimeout(function () {
            markValidation(websiteUrl, isURL(websiteUrl.value));
        },
        500
    );
}

function validatePassword() {
    setTimeout(function () {
            const condition = arePasswordsSame(
                passwordInput.value,
                confirmedPasswordInput.value
            );
            markValidation(confirmedPasswordInput, condition);
        },
        500
    );
}

emailInput.addEventListener('keyup', validateEmail);
confirmedPasswordInput.addEventListener('keyup', validatePassword);
postalCodeInput.addEventListener('keyup', validatePostalCode);
websiteUrl.addEventListener('keyup', validateUrl);