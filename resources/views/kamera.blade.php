<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">
    <title>Comproller</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/kameraV2.css') }}">
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-body text-center">
                        <h1 class="mb-3 text-primary"><i class="bi bi-qr-code-scan"></i> QR Kód Rögzítő</h1>
                        <div class="ratio ratio-16x9 border rounded overflow-hidden">
                            <video id="qr-video"></video>
                        </div>
                        <div class="alert alert-info mt-3 fw-bold" id="qr-result">
                            📌 QR kód tartalma itt jelenik meg.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="js/kamera.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</body>
</html>
