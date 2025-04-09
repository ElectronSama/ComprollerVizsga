function megnez(passwordId, iconElement) {
    const field = document.getElementById(passwordId);
    const isHidden = field.type === 'password';
    field.type = isHidden ? 'text' : 'password';
    iconElement.src = isHidden ? 'kepek/szem_ki.png' : 'kepek/szem_be.png';
}