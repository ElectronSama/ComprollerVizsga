<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css\bootstrap-5.3.3\css\bootstrap.css') }}">
    <title>Comproller - Munkaidő</title>
</head>
<body>
    @include('navbarandfooter/nav')
    <div class="content">
        <ul class="nav nav-tabs m-5" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Automatikus Rögzités</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Manuális Rögzités</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Lekérdezés</button>
            </li>
        </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="container-fluid mt-4">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="card mb-4" style="border: 2px solid lightblue; border-radius: 10px;">
                                    <div class="card-header" style="background-color: lightblue; color: white;">
                                        <h4 class="mb-0" style="letter-spacing: 1px;">Dolgozói Jelenlét Nyilvántartás</h4>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr style="background-color: #f8fbff;">
                                                        <th class="text-center fw-bold px-3 py-3">ID</th>
                                                        <th class="text-center fw-bold px-3 py-3">Vezetéknév</th>
                                                        <th class="text-center fw-bold px-3 py-3">Keresztnév</th>
                                                        <th class="text-center fw-bold px-3 py-3">Érkezés</th>
                                                        <th class="text-center fw-bold px-3 py-3">Távozás</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($Csekkolasok as $Csekkolas)
                                                    <tr>
                                                        <td class="text-center py-2">{{ $Csekkolas->DolgozoID }}</td>
                                                        <td class="text-center py-2">{{ $Csekkolas->Vezeteknev }}</td>
                                                        <td class="text-center py-2">{{ $Csekkolas->Keresztnev }}</td>
                                                        <td class="text-center py-2">{{ $Csekkolas->Datum_Be }}</td>
                                                        <td class="text-center py-2">{{ $Csekkolas->Datum_Ki }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <div class="container mt-3">
                    <div class="card">
                        <div class="card-header" style="background-color: lightblue; color: white;">
                            <h3 class="card-title mb-0">
                                <div id="clock" class="text-center fw-bold" style="font-size: 2.2em; letter-spacing: 1px; text-transform: uppercase;">00:00:00</div>
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="php/mfeltoltes.php" method="POST" target="_blank" id="a_form">
                                <div class="row justify-content-center">
                                    <div class="col-md-5">
                                        <div class="card mb-4" style="border: 2px solid lightblue; border-radius: 10px;">
                                            <div class="card-header" style="background-color: lightblue; color: white;">
                                                <h4 class="mb-0" style="letter-spacing: 1px;">Munkanap adatok</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="date" class="form-label fw-bold">Dátum:</label>
                                                    <input type="date" class="form-control" id="date" name="idopont_input" style="border: 1px solid lightblue;">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="date" class="form-label fw-bold">Vég Dátum:</label>
                                                    <input type="date" class="form-control" id="date2" name="idopont_input2" style="border: 1px solid lightblue;" oninput="datum()">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="time" class="form-label fw-bold">Idő:</label>
                                                    <input type="time" class="form-control" id="time" name="idopont_ido" style="border: 1px solid lightblue;">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="time" class="form-label fw-bold">Vég Idő:</label>
                                                    <input type="time" class="form-control" id="time2" name="idopont_ido2" style="border: 1px solid lightblue;">
                                                </div>
                                                <div class="mb-3" hidden>
                                                    <label for="hours" class="form-label fw-bold">Munkanap hossza:</label>
                                                    <select class="form-control" id="hours" name="leiras_input" style="border: 1px solid lightblue;">
                                                        <option value="4">4 óra</option>
                                                        <option value="8">8 óra</option>
                                                        <option value="12">12 óra</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5" hidden>
                                        <div class="card mb-4" style="border: 2px solid lightblue; border-radius: 10px;">
                                            <div class="card-header" style="background-color: lightblue; color: white;">
                                                <h4 class="mb-0" style="letter-spacing: 1px;">Szünet adatok</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3 text-center p-3 bg-light disabled-div" id="no-break-div">
                                                    <span class="fw-bold">Nincs szünet.</span>
                                                </div>
                                                <div class="mb-3 break-group" id="break-group-1">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="break-time-1" class="form-label fw-bold">1. Szünet kezdete:</label>
                                                            <input type="time" class="form-control" id="break-time-1" name="break_time_1" style="border: 1px solid lightblue;">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="break-end-1" class="form-label fw-bold">1. Szünet vége:</label>
                                                            <input type="time" class="form-control" id="break-end-1" name="break_end_1" style="border: 1px solid lightblue;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 break-group" id="break-group-2">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="break-time-2" class="form-label fw-bold">2. Szünet kezdete:</label>
                                                            <input type="time" class="form-control" id="break-time-2" name="break_time_2" style="border: 1px solid lightblue;">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="break-end-2" class="form-label fw-bold">2. Szünet vége:</label>
                                                            <input type="time" class="form-control" id="break-end-2" name="break_end_2" style="border: 1px solid lightblue;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-4">
                                    <div class="col-md-10">
                                        <div class="mb-3">
                                            <label for="name" class="form-label fw-bold">Név:</label>
                                            <input type="text" class="form-control" id="name" name="muszak_input" placeholder="Írd be a nevet" style="border: 1px solid lightblue;">
                                        </div>
                                        <div class="d-grid gap-2 col-md-6 mx-auto">
                                            <button type="button" id="add-button" class="btn btn-lg" style="background-color: lightblue; color: white; font-weight: bold; letter-spacing: 1px; border-radius: 50px; transition: all 0.3s;">Hozzáadás a táblázathoz</button>
                                        </div>
                                        <div id="error-message" class="alert alert-danger mt-3 d-none"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            
                    <div class="card mt-4">
                        <div class="card-header" style="background-color: lightblue; color: white;">
                            <h4 class="mb-0" style="letter-spacing: 1px;">Rögzített adatok</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="info-table" class="table table-striped table-bordered">
                                    <thead style="background-color: lightblue; color: white;">
                                        <tr>
                                            <th>ID</th>
                                            <th>Vezetéknév</th>
                                            <th>Keresztnév</th>
                                            <th>Kezdés</th>
                                            <th>Befejezés</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                <div class="container mt-3">
                    <div class="card">
                        <div class="card-header" style="background-color: lightblue; color: white;">
                            <div class="mb-2">
                                <h1 style="text-align: center">Lekérdezés</h1>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="php/mfeltoltes.php" method="POST" target="_blank" id="a_form">
                                <div class="row justify-content-center">
                                    <div class="col-md-5">
                                        <div class="card mb-4" style="border: 2px solid lightblue; border-radius: 10px;">
                                            <div class="card-header" style="background-color: lightblue; color: white;">
                                                <h4 class="mb-0" style="letter-spacing: 1px;">Munkavállalói adatok</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label fw-bold">ID:</label>
                                                    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Keress..." style="border: 1px solid lightblue;">
                                                    <datalist id="datalistOptions">
                                                        <option value="1">
                                                        <option value="2">
                                                    </datalist>                                 
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="name" name="muszak_input" placeholder="Vezetéknév" style="border: 1px solid lightblue;">
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="name" name="muszak_input" placeholder="Keresztnév" style="border: 1px solid lightblue;">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="date" class="form-label fw-bold">Dátum:</label>
                                                    <input type="date" class="form-control" id="date" name="idopont_input" style="border: 1px solid lightblue;">
                                                </div>
                                                <div class="mb-3">
                                                    <div class="mb-3">
                                                        <input type="date" class="form-control" id="date" name="idopont_input" style="border: 1px solid lightblue;">
                                                    </div>
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Időszakos lekérdezés
                                                    </label>                                           
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="card mb-4" style="border: 2px solid lightblue; border-radius: 10px;">
                                            <div class="card-header" style="background-color: lightblue; color: white;">
                                                <h4 class="mb-0" style="letter-spacing: 1px;">Lekérdezés eredménye:</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label fw-bold">Összes óra:</label>
                                                    <input type="text" class="form-control" id="name" name="muszak_input" placeholder="Írd be a nevet" style="border: 1px solid lightblue;">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="date" class="form-label fw-bold">Csekkolások száma:</label>
                                                    <input type="text" class="form-control" id="name" name="muszak_input" placeholder="Írd be a nevet" style="border: 1px solid lightblue;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-4">
                                    <div class="col-md-10">
                                        <div class="d-grid gap-2 col-md-6 mx-auto">
                                            <button type="button" id="add-button" class="btn btn-lg" style="background-color: lightblue; color: white; font-weight: bold; letter-spacing: 1px; border-radius: 50px; transition: all 0.3s;">Lekérdezés</button>
                                        </div>
                                        <div id="error-message" class="alert alert-danger mt-3 d-none"></div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
            
                    <div class="card mt-4">
                        <div class="card-header" style="background-color: lightblue; color: white;">
                            <h4 class="mb-0" style="letter-spacing: 1px;">Rögzített adatok</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="info-table" class="table table-striped table-bordered">
                                    <thead style="background-color: lightblue; color: white;">
                                        <tr>
                                            <th>ID</th>
                                            <th>Vezetéknév</th>
                                            <th>Keresztnév</th>
                                            <th>Kezdés</th>
                                            <th>Befejezés</th>
                                            <th>Összes óra</th>
                                            <th>Összes órabér</th>
                                            <th>Bónusz</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                <div class="container mt-3">
                    <div class="card">
                        <div class="card-header" style="background-color: lightblue; color: white;">
                            <div class="mb-2">
                                <h1 style="text-align: center">Lekérdezés</h1>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" target="_blank" id="a_form">
                                <div class="row justify-content-center">
                                    <div class="col-md-5">
                                        <div class="card mb-4" style="border: 2px solid lightblue; border-radius: 10px;">
                                            <div class="card-header" style="background-color: lightblue; color: white;">
                                                <h4 class="mb-0" style="letter-spacing: 1px;">Munkavállalói adatok</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label fw-bold">ID:</label>
                                                    <input class="form-control" list="datalistOptions" name="keresett_dolgozo" id="exampleDataList" placeholder="Keress..." style="border: 1px solid lightblue;">
                                                    <datalist id="datalistOptions">
                                                        <option value="1">
                                                        <option value="2">
                                                    </datalist>                                 
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="name" name="vezeteknev_input" placeholder="Vezetéknév" style="border: 1px solid lightblue;">
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="name" name="keresztnev_input" placeholder="Keresztnév" style="border: 1px solid lightblue;">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="date" class="form-label fw-bold">Dátum:</label>
                                                    <input type="date" class="form-control" id="date" name="lekeresido_input" style="border: 1px solid lightblue;">
                                                </div>
                                                <div class="mb-3">
                                                    <div class="mb-3">
                                                        <input type="date" class="form-control" id="date" name="honapido_input" style="border: 1px solid lightblue;">
                                                    </div>
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Időszakos lekérdezés
                                                    </label>                                           
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="card mb-4" style="border: 2px solid lightblue; border-radius: 10px;">
                                            <div class="card-header" style="background-color: lightblue; color: white;">
                                                <h4 class="mb-0" style="letter-spacing: 1px;">Lekérdezés eredménye:</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label fw-bold">Összes óra:</label>
                                                    <input type="text" class="form-control" id="name" name="ossz_input" placeholder="Írd be a nevet" style="border: 1px solid lightblue;">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="date" class="form-label fw-bold">Csekkolások száma:</label>
                                                    <input type="text" class="form-control" id="name" name="csekk_input" placeholder="Írd be a nevet" style="border: 1px solid lightblue;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-4">
                                    <div class="col-md-10">
                                        <div class="d-grid gap-2 col-md-6 mx-auto">
                                            <button type="button" id="add-button" class="btn btn-lg" style="background-color: lightblue; color: white; font-weight: bold; letter-spacing: 1px; border-radius: 50px; transition: all 0.3s;">Lekérdezés</button>
                                        </div>
                                        <div id="error-message" class="alert alert-danger mt-3 d-none"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header" style="background-color: lightblue; color: white;">
                            <h4 class="mb-0" style="letter-spacing: 1px;">Rögzített adatok</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="info-table" class="table table-striped table-bordered">
                                    <thead style="background-color: lightblue; color: white;">
                                        <tr>
                                            <th>ID</th>
                                            <th>Vezetéknév</th>
                                            <th>Keresztnév</th>
                                            <th>Kezdés</th>
                                            <th>Befejezés</th>
                                            <th>Összes óra</th>
                                            <th>Összes órabér</th>
                                            <th>Bónusz</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    @include('navbarandfooter/footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="css\bootstrap-5.3.3\js\bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="js/munkaido.js"></script> 
</body>
</html>