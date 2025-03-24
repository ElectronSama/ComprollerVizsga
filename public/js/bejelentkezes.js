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
    const username = document.getElementById('b_nev').value;
    const password = document.getElementById('password-signin').value;
    const errorMessage = document.getElementById('error-message');

    if (username === "" || password === "") {
        event.preventDefault();
        if (!errorMessage) {
            const errorElement = document.createElement('div');
            errorElement.id = 'error-message';
            errorElement.className = 'alert alert-danger mt-3';
            errorElement.textContent = "Töltse ki az Email címet és a jelszót!";
            document.querySelector('.form-wrapper').appendChild(errorElement);
        }
    } else {
        if (errorMessage) {
            errorMessage.remove();
        }
    }
});