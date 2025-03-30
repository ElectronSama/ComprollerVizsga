document.addEventListener("DOMContentLoaded", function () {
    function calculateTotal() {
        let total = 0;
        document.querySelectorAll("tbody tr").forEach(function (row) {
            let cell = row.querySelector("td:last-child"); // Az utolsó oszlop (Végösszeg)
            if (cell) {
                let value = parseFloat(cell.textContent.trim().replace(/,/g, "")) || 0;
                total += value;
            }
        });
        
        // Mezők frissítése az összeggel (egész érték)
        document.querySelectorAll("#vegosszeg_osszeg").forEach(function (input) {
            input.value = Math.round(total);
        });
    }
    
    // Kalkuláció inicializálása
    calculateTotal();
});
