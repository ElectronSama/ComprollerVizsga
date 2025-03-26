<x-app-layout>
<link rel="stylesheet" href="{{ asset('css/munkaido.css') }}">
<?php // Belsős csatlakozás adatbázishoz.
        $szerver = "localhost";
        $felhasznalo = "root";
        $jelszo = "";
        $adatbazis = "comproller";

        $kapcsolodas = new mysqli($szerver, $felhasznalo, $jelszo, $adatbazis);
    ?>
    <div class="content">
        <ul class="nav nav-pills justify-content-center m-4" id="pills-tab" role="tablist">
            <li class="nav-item p-2" role="presentation">
                <button class="btn btn-primary active" id="home-tab" data-bs-toggle="pill" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><i class="bi bi-arrow-left-right"></i> Csekkolások</button>
            </li>
            <li class="nav-item p-2" role="presentation">
                <button class="btn btn-primary" id="profile-tab" data-bs-toggle="pill" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"><i class="bi bi-pencil-fill"></i> Manuális rögzítés</button>
            </li>
            <li class="nav-item p-2" role="presentation">
                <button class="btn btn-primary" id="contact-tab" data-bs-toggle="pill" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"><i class="bi bi-search"></i> Lekérdezés</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <div class="container-fluid mt-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="card mb-4" id="szin2">
                                <div class="card-header" id="szin">
                                    <h4 class="mb-0" id="betuk">Dolgozói Jelenlét Nyilvántartás</h4>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr id="szin3">
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
                                                    <td class="text-center py-2">{{ $Csekkolas->CsekkolasID }}</td>
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
                    <div class="card-header" id="szin">
                        <h3 class="card-title mb-0">
                            <div id="clock" class="text-center fw-bold">00:00:00</div>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="php/mfeltoltes.php" method="POST" target="_blank" id="a_form">
                            <div class="row justify-content-center">
                                <div class="col-md-5">
                                    <div class="card mb-4" id="szin2">
                                        <div class="card-header" id="szin">
                                            <h4 class="mb-0" id="betuk">Munkanap adatok</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="date" class="form-label fw-bold">Dátum:</label>
                                                <input type="date" class="form-control" id="date" name="idopont_input" id="szin" onblur="mezo_ellenorzes()" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="date" class="form-label fw-bold">Vég Dátum:</label>
                                                <input type="date" class="form-control" id="date2" name="idopont_input2" id="szin" onblur="mezo_ellenorzes()" oninput="datum()" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="time" class="form-label fw-bold">Idő:</label>
                                                <input type="time" class="form-control" id="time" name="idopont_ido" id="szin" onblur="mezo_ellenorzes()" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="time" class="form-label fw-bold">Vég Idő:</label>
                                                <input type="time" class="form-control" id="time2" name="idopont_ido2" id="szin" onblur="mezo_ellenorzes()" required>
                                            </div>
                                            <div class="mb-3" hidden>
                                                <label for="hours" class="form-label fw-bold">Munkanap hossza:</label>
                                                <select class="form-control" id="hours" name="leiras_input" id="szin">
                                                    <option value="4">4 óra</option>
                                                    <option value="8">8 óra</option>
                                                    <option value="12">12 óra</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5" hidden>
                                    <div class="card mb-4" id="szin2">
                                        <div class="card-header" id="szin">
                                            <h4 class="mb-0" id="betuk">Szünet adatok</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3 text-center p-3 bg-light disabled-div" id="no-break-div">
                                                <span class="fw-bold">Nincs szünet.</span>
                                            </div>
                                            <div class="mb-3 break-group" id="break-group-1">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="break-time-1" class="form-label fw-bold">1. Szünet kezdete:</label>
                                                        <input type="time" class="form-control" id="break-time-1" name="break_time_1" id="szin">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="break-end-1" class="form-label fw-bold">1. Szünet vége:</label>
                                                        <input type="time" class="form-control" id="break-end-1" name="break_end_1" id="szin">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 break-group" id="break-group-2">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="break-time-2" class="form-label fw-bold">2. Szünet kezdete:</label>
                                                        <input type="time" class="form-control" id="break-time-2" name="break_time_2" id="szin">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="break-end-2" class="form-label fw-bold">2. Szünet vége:</label>
                                                        <input type="time" class="form-control" id="break-end-2" name="break_end_2" id="szin">
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
                                        <input type="text" class="form-control" id="name" name="muszak_input" placeholder="Írd be a nevet" id="szin">
                                    </div>
                                    <div class="d-grid gap-2 col-md-6 mx-auto">
                                        <button type="button" id="add-button" class="btn btn-lg" onclick="lezar()">Hozzáadás a táblázathoz</button>
                                    </div>
                                    <div id="error-message" class="alert alert-danger mt-3 d-none"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header" id="szin">
                        <h4 class="mb-0" style="letter-spacing: 1px;">Rögzített adatok</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="info-table" class="table table-striped table-bordered">
                                <thead id="szin">
                                    <tr>
                                        <th>ID</th>
                                        <th>Név</th>
                                        <th>Kezdés</th>
                                        <th>Befejezés</th>
                                        <th>Kezdeti idő</th>
                                        <th>Befejezési idő</th>
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
        <!-- INNEN KEZDŐDIK A LEKÉRDEZÉS! -->
        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
            <div class="container mt-3">
                <div class="card">
                    <div class="card-header" id="szin">
                        <div class="mb-2">
                            <h1 style="text-align: center">Lekérdezés</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="row justify-content-center">
                                <div class="col-md-5">
                                    <div class="card mb-4" id="szin2">
                                        <div class="card-header" id="szin">
                                            <h4 class="mb-0" id="betuk">Munkavállalói adatok</h4>
                                        </div>
                                        <div class="card-body">
                                            <form id="lekérdezésForm">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label fw-bold">Név:</label>
                                                    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Keress..." name="dolgozoid" required onblur="nev_ellenorzes()">                              
                                                </div>
                                                <div class="mb-3">
                                                    <label for="date" class="form-label fw-bold">Dátum:</label>
                                                    <input type="date" class="form-control" id="datum_kezd" name="datum_kezd" oninput="datum1()">
                                                </div>
                                                <div class="mb-3">
                                                    <div class="mb-3">
                                                        <input type="date" class="form-control" id="datum_befejez" name="datum_befejez" oninput="datum2()" disabled>
                                                    </div>
                                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault" oninput="idoszakos()">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Időszakos lekérdezés
                                                    </label>                                           
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-4">
                                <div class="col-md-10">
                                    <div>
                                        <form action="php/matadas.php" method="POST" target="_blank" id="atadas_form">
                                            <input type="text" id="dID" name="exampleDataList" hidden><br>
                                            <input type="text" id="dkezd" name="dkezd" hidden><br>
                                            <input type="text" id="dveg" name="dveg" hidden><br>
                                            <input type="submit" id="phpgomb" class="btn btn-info" onclick="datum_szures()" value="Listázás" disabled>
                                        </form>
                                    </div>
                                    <div id="error-message" class="alert alert-danger mt-3 d-none"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header" id="szin">
                        <h4 class="mb-0" id="betuk">Rögzített adatok</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="php/listatorles.php" method="POST" target="_blank">
                                <input type="submit" class="btn btn-danger" value="Lista Törlése">
                            </form>
                            <table id="info-table" class="table table-striped table-bordered">
                                <thead id="szin">
                                    <tr>
                                        <table>
                                            <tbody>
                                                <?php
                                        
                                                    $sql = "SELECT DolgozoID, Nev, Datum_Be, Datum_Ki FROM ideiglenes";
                                                    $eredmeny = $kapcsolodas->query($sql);
                                            
                                                    if ($eredmeny->num_rows > 0) 
                                                    {
                                                        while ($sor = $eredmeny->fetch_assoc()) 
                                                        {
                                                            echo '<tr>';
                                                            echo '    <td>' . $sor["DolgozoID"] . '</td>';
                                                            echo '    <td>' . $sor["Nev"] . '</td>';
                                                            echo '    <td>' . $sor["Datum_Be"] . '</td>';
                                                            echo '    <td>' . $sor["Datum_Ki"] . '</td>';
                                                            echo '</tr>';
                                                        }
                                                    } 
                                                    else 
                                                    {
                                                        echo '<tr><td>Nincsenek adatok.</td></tr>';
                                                    }
                                            
                                                    $kapcsolodas->close();
                                                ?>
                                            </tbody>
                                        </table>

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
<script src="{{ asset('js/munkaido.js') }}"></script>
</x-app-layout>
