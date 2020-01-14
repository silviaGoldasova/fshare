/*
validation.js
- features validation of every field in the sign up and sign in form
- validation consists of checking the length of the inputs, the inclusion of special characters
- in case of an incorrect input, an error box is displayed
 */

const form_up  = document.getElementsByTagName('form')[0];
const email_up = document.getElementById('email_up');
const name = document.getElementById('name');
const password_up = document.getElementById('password_up');
const error_field = document.getElementsByClassName('error_js')[0];

const form_in  = document.getElementsByTagName('form')[1];
const email_in = document.getElementById('email_in');
const password_in = document.getElementById('password_in');

//sign up validation

email_up.addEventListener("input", function (event) {
    if (email_up.validity.valid) {
        error_field.innerHTML = "";
        error_field.className = "";
    }
}, false);
password_up.addEventListener("input", function (event) {
    if (password_up.validity.valid) {
        error_field.innerHTML = "";
        error_field.className = "";
    }
}, false);
name.addEventListener("input", function (event) {
    if (name.validity.valid) {
        error_field.innerHTML = "";
        error_field.className = "";
    }
}, false);
form_up.addEventListener("submit", function (event) {
    if (!email_up.validity.valid) {
        error_field.innerHTML = "Missing email";
        error_field.className = "error_js active error";
        event.preventDefault();
    }

    var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(!email_up.value.match(emailformat)){
        error_field.innerHTML = "Inputted email does not match character requirements, such as inclusion of '@' character or other.";
        error_field.className = "error_js active  error";
        event.preventDefault();
    }

    if (password_up.value.length < 5) {
        error_field.innerHTML = "Inputted password is too short (should be longer than 4 characters.)";
        error_field.className = "error_js active error";
        event.preventDefault();
    }

    var letters = /^[A-Za-z]+$/;
    if (!name.value.match(letters)) {
        error_field.innerHTML = "Name should contain only letters.";
        error_field.className = "error_js active error";
        event.preventDefault();
    }

}, false);

//sign in validation
email_in.addEventListener("input", function (event) {
    if (email_in.validity.valid) {
        error_field.innerHTML = "";
        error_field.className = "";
    }
}, false);
password_in.addEventListener("input", function (event) {
    if (password_in.validity.valid) {
        error_field.innerHTML = "";
        error_field.className = "";
    }
}, false);
form_in.addEventListener("submit", function (event) {
    if (!email_in.validity.valid) {
        error_field.innerHTML = "Missing email";
        error_field.className = "error_js active";
        event.preventDefault();
    }

    var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(!email_in.value.match(emailformat)){
        error_field.innerHTML = "Inputted email does not match character requirements, such as inclusion of '@' character or other.";
        error_field.className = "error_js active";
        event.preventDefault();
    }

    if (email_in.value.length < 5) {
        error_field.innerHTML = "Inputted email is too short (should be longer than 4 characters.)";
        error_field.className = "error_js active";
        event.preventDefault();
    }

    if (password_in.value.length < 5) {
        error_field.innerHTML = "Inputted password is too short (should be longer than 4 characters.)";
        error_field.className = "error_js active";
        event.preventDefault();
    }

}, false);
