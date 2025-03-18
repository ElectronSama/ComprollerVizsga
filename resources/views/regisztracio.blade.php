<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">
    <link rel="stylesheet" href="{{ asset('css\bootstrap-5.3.3\css\bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/regisztracio.css') }}">
    <title>Regisztráció</title>
</head>
<body>
    @include('navbarandfooter/nav')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="h3 mb-0">Regisztráció</h1>
                    </div>
                    <div class="card-body">
                        <form action="/regisztracio" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="felhasznalo_nev" class="form-label">Felhasználónév</label>
                                <input name="felhasznalonev" type="text" class="form-control" id="felhasznalonev" placeholder="Írja be a felhasználónevét" onchange="kitoltve()">
                            </div>

                            <div class="mb-3">
                                <label for="jog" class="form-label">Jogkör</label>
                                <input name="szerep" type="text" class="form-control" id="szerep" placeholder="Írja be a jogkörét" onchange="kitoltve()">
                            </div>

                            <div class="mb-3">
                                <label for="jelszo" class="form-label">Jelszó</label>
                                <div class="input-group">
                                    <input name="jelszo" type="password" class="form-control" id="jelszo" placeholder="Írja be a jelszavát" onchange="kitoltve()">
                                    <span class="input-group-text">
                                        <a onclick="megvaltoztat()">
                                            <img src="kepek/szem_be.png" id="szem_kep">
                                        </a>
                                    </span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="jelszo_megerosites" class="form-label">Jelszó megerősítése</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="jelszo_megerosites" placeholder="Írja be újra a jelszavát" onchange="kitoltve()">
                                    <span class="input-group-text">
                                        <a onclick="megvaltoztat2()">
                                            <img src="kepek/szem_be.png" id="szem_kep2">
                                        </a>
                                    </span>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100" id="regisztracio_gomb" disabled>Regisztráció</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/regisztracio.js"></script> 
    @include('navbarandfooter/footer')
    <script src="css\bootstrap-5.3.3\js\bootstrap.js"></script>
</body>
</html>
