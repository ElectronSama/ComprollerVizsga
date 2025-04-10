<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <link rel="icon" type="image/x-icon" href="kepek/icon.png">
        <title>Comproller</title>
        <link rel="stylesheet" href="{{ asset('css/kapcsolat.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <div class="container">
                <header class="row py-4">
                    <nav class="col-12">
                        <div class="d-flex justify-content-between px-3">
                            <div class="d-flex align-items-center">
                                <a href="/" class="bi bi-moon-stars-fill" style="font-size: 3rem; color: white;"></a>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="btn btn-light">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-light d-flex align-items-center gap-2">
                                        <i class="bi bi-box-arrow-in-right"></i>
                                        Bejelentkezés
                                    </a>
                                    <a href="{{ url('/contact') }}" class="btn btn-light d-flex align-items-center gap-2">
                                        <i class="bi bi-envelope"></i>
                                        Kapcsolat
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </nav>
                </header>
            
            <main class="py-5">
            <div class="row g-4">
                    <div class="col-lg-8">
                        <form id="emailForm" action="https://api.web3forms.com/submit" method="POST" class="p-4 border rounded shadow-sm bg-light">
                            <input type="hidden" name="access_key" value="8930859f-cfe1-4901-a61e-2015658720db">
                            <input type="hidden" name="redirect" value="false">
                            <input type="hidden" name="message" value="">
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">Név:</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail:</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="subject" class="form-label">Tárgy:</label>
                                <select id="subject" name="subject" class="form-select" required>
                                    <option value="Általános érdeklődés">Általános érdeklődés</option>
                                    <option value="Technikai támogatás">Technikai támogatás</option>
                                    <option value="Visszajelzés">Visszajelzés</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="message" class="form-label">Üzenet:</label>
                                <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
                            </div>
                            
                            <input type="hidden" id="fromName" name="from_name">
                            
                            <button type="submit" class="btn btn-primary">Küldés</button>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="card shadow h-100">
                            <div class="card-body p-4">
                                <h3 class="card-title mb-4">Elérhetőségeink</h3>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex align-items-center">
                                        <strong class="me-2">Facebook:</strong>
                                        <a href="https://bit.ly/4kTgo2Q" class="text-decoration-none">https://bit.ly/4kTgo2Q</a>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <strong class="me-2">Instagram:</strong>
                                        <a href="https://bit.ly/3FuSo69" class="text-decoration-none">https://bit.ly/3FuSo69</a>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <strong class="me-2">GitHub:</strong>
                                        <a href="https://bit.ly/4h8fP2g" class="text-decoration-none">https://bit.ly/4h8fP2g</a>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <strong class="me-2">Email:</strong>
                                        <a href="mailto:comprollerinfo@gmail.com" class="text-decoration-none">comprollerinfo@gmail.com</a>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <strong class="me-2">Telefon:</strong>
                                        <a href="tel:+36123456789" class="text-decoration-none">+36 1 234 5678</a>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <strong class="me-2">Telegram:</strong>
                                        <a href="https://t.me/comproller" class="text-decoration-none">t.me/comproller</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <script src="{{ asset('js/kapcsolat.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>