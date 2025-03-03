<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('kepek/icon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-5.3.3/css/bootstrap.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/kamera.css') }}">
    <title>QR Kód Olvasó</title>
    <style>
       
    </style>
</head>
<body>
    <h1>QR Kód Rögzítő</h1>
    <video id="qr-video"></video>
    <div id="qr-result">QR kód tartalma itt jelenik meg.</div>

    <script type="module" src="js/kamera.js"></script> 
    <script src="css\bootstrap-5.3.3\js\bootstrap.js"></script>
</body>
</html>
