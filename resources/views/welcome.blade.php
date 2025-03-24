<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <title>Comproller</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/fooldal.css') }}">
    </head>
    <body class="bg-light">
        <div class="container">
            @if (Route::has('login'))
                <header class="row py-4">
                    <nav class="col-12">
                        <div class="d-flex justify-content-between px-3">
                            <div class="d-flex align-items-center">
                                <a href="/" class="bi bi-moon-stars-fill" style="font-size: 3rem; color: white;"></a>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="btn btn-light">Irányítópult</a>
                                    <a href="{{ url('/camera') }}" class="btn btn-light">Kamera</a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-light d-flex align-items-center gap-2">
                                        <i class="bi bi-box-arrow-in-right"></i>
                                        Bejelentkezés
                                    </a>
                                    <a href="{{ route('register') }}" class="btn btn-light d-flex align-items-center gap-2">
                                        <i class="bi bi-person-fill-add"></i>
                                        Regisztráció
                                    </a>
                                    <a href="{{ url('contact') }}" class="btn btn-light d-flex align-items-center gap-2">
                                        <i class="bi bi-envelope"></i>
                                        Kapcsolat
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </nav>
                </header>
            @endif
            
            <main class="py-5">
                <div class="text-center">
                    <h1 class="display-3 mb-4 fw-bold text-white" id="typewriter"></h1>
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                            <div class="card"></div>
                        </div>
                    </div>
                    <div class="m-5 row justify-content-center">
                        <div class="col-md-12">
                            <h1 class="text-white fw-bold text-box d-inline-block me-1">Ránk</h1>
                            <h1 class="text-white fw-bold text-box d-inline-block me-1">mindig</h1>
                            <h1 class="text-white fw-bold text-box d-inline-block">számíthat.</h1>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <!-- Bootstrap JS Bundle -->
        <script src="{{ asset('js/fooldal.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>