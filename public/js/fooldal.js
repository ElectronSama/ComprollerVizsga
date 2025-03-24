const text = "Comproller.";
const typewriter = document.getElementById('typewriter');
let i = 0;

function type() {
    if (i < text.length) {
        typewriter.textContent = text.substring(0, i + 1);
        i++;
        setTimeout(type, 150);
    }
}

window.onload = type;

document.addEventListener('DOMContentLoaded', function() {
    const boxes = document.querySelectorAll('.text-box');
    boxes.forEach((box, index) => {
        setTimeout(() => {
            box.classList.add('show');
        }, 1000 * (index + 2));
    });
});