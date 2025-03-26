<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comproller - QR Kód Olvasó</title>
    <link rel="stylesheet" href="{{ asset('css/kameraV2.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="text-center mb-4">
                <a href="/" class="btn btn-light rounded-pill px-4 py-2">
                    <i class="bi bi-moon-stars-fill me-2"></i>
                    Vissza
                </a>
            </div>
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
                        <form id="qr-form" action="{{ route('csekkolas') }}" method="POST">
                            @csrf
                            <input type="hidden" name="qr_data" id="qr-input">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="module" src="{{ asset('js/kamera.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
