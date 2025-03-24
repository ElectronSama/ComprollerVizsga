<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <title>{{ config('app.name', 'Comproller') }}</title>
        <link rel="stylesheet" href="{{ asset('css/guest.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        <div class="container min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <div class="text-center mb-4">
                <a href="/" class="btn btn-light rounded-pill px-4 py-2">
                    <i class="bi bi-moon-stars-fill me-2"></i>
                    Vissza
                </a>
            </div>
            <div class="card shadow w-100" style="max-width: 28rem;">
                <div class="card-body">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
