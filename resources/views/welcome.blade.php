<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <link rel="icon" type="image/x-icon" href="kepek/icon.png">
        <title>Comproller</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/fooldal.css') }}">
        <style>
            /* Additional mobile-specific styles */
            @media (max-width: 768px) {
                .btn-mobile {
                    padding: 0.5rem;
                    font-size: 0.9rem;
                }
                .btn-mobile i {
                    margin-right: 0.2rem;
                }
                .header-logo {
                    font-size: 2rem !important;
                }
                .typewriter-text {
                    font-size: 2rem !important;
                }
                .text-box {
                    display: block !important;
                    margin-bottom: 0.5rem;
                }
                .nav-buttons {
                    gap: 0.5rem !important;
                    flex-wrap: wrap;
                    justify-content: flex-end !important;
                }
            }
        </style>
    </head>
    <body class="bg-light">
        <div class="container">
            @if (Route::has('login'))
                <header class="row py-3 py-md-4">
                    <nav class="col-12">
                        <div class="d-flex justify-content-between px-2 px-md-3">
                            <div class="d-flex align-items-center">
                                <a href="/" class="bi bi-moon-stars-fill header-logo" style="font-size: 3rem; color: white;"></a>
                            </div>
                            <div class="d-flex align-items-center nav-buttons gap-2 gap-md-3">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="btn btn-light btn-mobile">
                                        <i class="bi bi-house-gear-fill"></i>
                                        <span class="d-none d-sm-inline">Irányítópult</span>
                                    </a>
                                    <a href="{{ url('/camera') }}" class="btn btn-light btn-mobile">
                                        <i class="bi bi-qr-code-scan"></i>
                                        <span class="d-none d-sm-inline">Kamera</span>
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-light btn-mobile d-flex align-items-center gap-1 gap-md-2">
                                        <i class="bi bi-box-arrow-in-right"></i>
                                        <span>Bejelentkezés</span>
                                    </a>
                                    <a href="{{ route('register') }}" class="btn btn-light btn-mobile d-flex align-items-center gap-1 gap-md-2">
                                        <i class="bi bi-person-fill-add"></i>
                                        <span class="d-none d-sm-inline">Regisztráció</span>
                                    </a>
                                    <a href="{{ url('contact') }}" class="btn btn-light btn-mobile">
                                        <i class="bi bi-envelope"></i>
                                        <span class="d-none d-sm-inline">Kapcsolat</span>
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </nav>
                </header>
            @endif
            
            <main class="py-3 py-md-5">
                <div class="text-center px-2">
                    <h1 class="display-3 mb-4 fw-bold text-white typewriter-text" id="typewriter"></h1>
                    <div class="row justify-content-center">
                        <div class="col-md-5 col-10">
                            <div class="card"></div>
                        </div>
                    </div>
                    <div class="m-3 m-md-5 row justify-content-center">
                        <div class="col-md-12">
                            <h1 class="text-white fw-bold text-box d-inline-block me-1 me-md-1 mb-1 mb-md-0">Ránk</h1>
                            <h1 class="text-white fw-bold text-box d-inline-block me-1 me-md-1 mb-1 mb-md-0">mindig</h1>
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