document.getElementById('emailForm').addEventListener('submit', function(event) {
    const nameInput = document.getElementById('name').value;
    document.getElementById('fromName').value = nameInput;
});