import QrScanner from "https://cdn.jsdelivr.net/npm/qr-scanner@1.4.2/qr-scanner.min.js";

document.addEventListener("DOMContentLoaded", () => {
    const video = document.getElementById("qr-video");
    const qrResult = document.getElementById("qr-result");
    const qrInput = document.getElementById("qr-input"); // Input mező
    const qrForm = document.getElementById("qr-form");

    let lastScanTime = 0; // Utolsó szkennelés időpontja

    const scanner = new QrScanner(video, result => {
        const now = Date.now();
        const elapsedTime = (now - lastScanTime) / 1000; // Idő másodpercben

        if (elapsedTime < 10) { // 10 másodperc várakozás
            console.log("Túl gyors szkennelés! Várj egy kicsit...");
            return;
        }

        lastScanTime = now; // Frissítjük az utolsó szkennelés időpontját

        console.log("QR kód beolvasva:", result);

        qrResult.textContent = `📌 QR kód tartalma: ${result}`;
        qrInput.value = result;

        setTimeout(() => {
            console.log("Űrlap elküldése...");
            qrForm.submit(); // Automatikus elküldés
            scanner.stop(); // Kamera leállítása
        }, 1000); // 1 másodperc várakozás az adat biztos beírásához
    });

    scanner.start();
});
