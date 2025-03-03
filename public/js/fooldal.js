let megnyomva = false;
function megnez(passwordId, iconElement) {
    const passwordField = document.getElementById(passwordId);
    if (megnyomva === false) {
    passwordField.type = 'text';
    iconElement.src = 'kepek/szem_ki.png';
    megnyomva = true;
    } else {
    passwordField.type = 'password';
    iconElement.src = 'kepek/szem_be.png';
    megnyomva = false;
    }
}

document.getElementById('loginForm').addEventListener('submit', function(event) {
const username = document.getElementById('username').value;
const password = document.getElementById('password-signin').value;
const errorMessage = document.getElementById('error-message');

if (username === "" || password === "") {
    event.preventDefault();
    errorMessage.textContent = "Töltse ki a felhasználónevet vagy a jelszót!";
    } else {
    errorMessage.textContent = "";
    }
});