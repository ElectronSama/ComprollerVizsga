function megnez(passwordId, iconElement) {
    const passwordField = document.getElementById(passwordId);
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        iconElement.src = 'kepek/szem_ki.png';
    } else {
        passwordField.type = 'password';
        iconElement.src = 'kepek/szem_be.png';
    }
}

function switchTab(tabId) {
    document.querySelectorAll('.tab-content').forEach(content => {
        content.classList.remove('active');
    });
    
    document.querySelectorAll('.tab').forEach(tab => {
        tab.classList.remove('active');
    });
    
    document.getElementById(tabId).classList.add('active');
    document.querySelector(`.tab:nth-child(${tabId === 'username' ? 1 : 2})`).classList.add('active');
    
    document.querySelectorAll('.message').forEach(msg => {
        msg.style.display = 'none';
    });
}

function showMessage(elementId, message, isSuccess) {
    const messageElement = document.getElementById(elementId);
    messageElement.textContent = message;
    messageElement.classList.remove('success-message', 'error-message');
    messageElement.classList.add(isSuccess ? 'success-message' : 'error-message');
    messageElement.style.display = 'block';
    
    setTimeout(() => {
        messageElement.style.display = 'none';
    }, 3000);
}

function clearUsernameFields() {
    document.getElementById('current-username').value = '';
    document.getElementById('new-username').value = '';
    document.getElementById('confirm-password-username').value = '';
}

function clearPasswordFields() {
    document.getElementById('current-password').value = '';
    document.getElementById('new-password').value = '';
    document.getElementById('confirm-new-password').value = '';
}

function changeUsername() {
    if (document.getElementById('new-username').value.trim() === '') {
        showMessage('username-message', 'Kérem adjon meg egy új felhasználónevet!', false);
        return;
    }
    if (document.getElementById('confirm-password-username').value.trim() === '') {
        showMessage('username-message', 'Kérem adja meg jelszavát a megerősítéshez!', false);
        return;
    }
    
    showMessage('username-message', 'Felhasználónév sikeresen módosítva!', true);
    clearUsernameFields();
}

function changePassword() {
    const currentPassword = document.getElementById('current-password');
    const newPassword = document.getElementById('new-password');
    const confirmNewPassword = document.getElementById('confirm-new-password');
    
    if (currentPassword.value.trim() === '') {
        showMessage('password-message', 'Kérem adja meg a jelenlegi jelszavát!', false);
        return;
    }
    
    if (newPassword.value.trim() === '') {
        showMessage('password-message', 'Kérem adjon meg egy új jelszót!', false);
        return;
    }
    
    if (confirmNewPassword.value.trim() === '') {
        showMessage('password-message', 'Kérem erősítse meg az új jelszavát!', false);
        return;
    }
    
    if (newPassword.value !== confirmNewPassword.value) {
        showMessage('password-message', 'A két jelszó nem egyezik!', false);
        return;
    }
    
    showMessage('password-message', 'Jelszó sikeresen módosítva!', true);
    clearPasswordFields();
}