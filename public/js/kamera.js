import QrScanner from "https://cdn.jsdelivr.net/npm/qr-scanner/qr-scanner.min.js";

const videoElem = document.getElementById('qr-video');
const resultElem = document.getElementById('qr-result');


const onScanSuccess = (result) => {
    resultElem.textContent = `QR kód tartalma: ${result.data}`;
    qrScanner.stop(); 

    fetch('/camera', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            qr_data: result.data
        })
    })
    .then(response => response.json())
    .then(data => {
        const alertElem = document.createElement('div');
        alertElem.textContent = data.status;
        alertElem.style.position = 'fixed';
        alertElem.style.top = '10px';
        alertElem.style.left = '50%';
        alertElem.style.transform = 'translateX(-50%)';
        alertElem.style.backgroundColor = data.status.includes('sikeres') ? '#4caf50' : '#f44336';
        alertElem.style.color = '#fff';
        alertElem.style.padding = '10px';
        alertElem.style.borderRadius = '5px';
        document.body.appendChild(alertElem);

        setTimeout(() => {
            alertElem.remove();
            qrScanner.start();
        }, 2000);
    })
    .catch(error => {
        console.error('Hiba történt:', error);
    });
};

const qrScanner = new QrScanner(videoElem, onScanSuccess, {
    onDecodeError: (error) => {
        console.warn(`Beolvasási hiba: ${error}`);
    },
    highlightScanRegion: true,
    highlightCodeOutline: true
});

qrScanner.start();

window.addEventListener('beforeunload', () => {
    qrScanner.stop();
});