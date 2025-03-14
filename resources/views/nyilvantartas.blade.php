<!DOCTYPE html>
<html lang="hu">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css\bootstrap-5.3.3\css\bootstrap.css') }}">
    <title>Comproller - Nyilvántartás</title>
    <link rel="stylesheet" href="css/nyilvantartas.css">
</head>
<body>
    @include('navbarandfooter/nav')
    <ul class="nav nav-tabs m-5" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Összes dolgozó</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Felvétel</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

            <div class="nyilvantartas_tarolo">
                <div class="tablazat_tarolo">
                    <table class="tablazat">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Vezetéknév</th>
                                <th>Keresztnév</th>
                                <th>Munkakör</th>
                                <th class="d-none d-sm-block">Eszközök</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Dolgozok as $Dolgozo)
                                <tr>
                                    <td>{{ $Dolgozo->DolgozoID }}</td>
                                    <td>{{ $Dolgozo->Vezeteknev }}</td>
                                    <td>{{ $Dolgozo->Keresztnev }}</td>
                                    <td>{{ $Dolgozo->Munkakor }}</td>
                                    <td class="d-none d-sm-block">
                                        <input type="image" src="kepek/kuka.svg" class="btn btn-danger btn-sm col-1" id="egy_gomb" onclick="torles({{ $Dolgozo->DolgozoID }})"/>
                                        <input type="image" src="kepek/cerka.svg" class="btn btn-primary btn-sm col-1" id="egy_gomb" onclick="lekeres({{ $Dolgozo->DolgozoID }})"/>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="modal" class="modal hidden">
                    <div class="modal-content">
                        <span class="close-button" onclick="bezaras()">×</span>
                        
                        <input type="hidden" id="modal_id">
                        
                        <div class="input-container">
                            <div class="input-row">
                                <div class="input-pair">
                                    <p><strong>Vezetéknév:</strong> <input type="text" id="modal_vezeteknev"></p>
                                    <p><strong>Keresztnév:</strong> <input type="text" id="modal_keresztnev"></p>
                                </div>
                                
                                <div class="input-pair">
                                    <p><strong>Email:</strong> <input type="email" id="modal_email"></p>
                                    <p><strong>Telefonszám:</strong> <input type="text" id="modal_telefonszam"></p>
                                </div>
                                
                                <div class="input-pair">
                                    <p><strong>Munkakör:</strong> <input type="text" id="modal_munkakor"></p>
                                    <p><strong>Alapbér:</strong> <input type="text" id="modal_alapber"></p>
                                </div>
                                
                                <div class="input-pair">
                                    <p><strong>Születési dátum:</strong> <input type="text" id="modal_szuletesi"></p>
                                    <p><strong>Anyja neve:</strong> <input type="text" id="modal_anyja"></p>
                                </div>
                                                                
                                <div class="input-pair">
                                    <p><strong>Tajszám:</strong> <input type="text" id="modal_tajszam"></p>
                                </div>
                            </div>
                            
                            <div class="input-row">
                                <div class="input-pair">
                                    <p><strong>Adószám:</strong> <input type="text" id="modal_adoszam"></p>
                                </div>
                                <div class="input-pair">
                                    <p><strong>Bankszámlaszám:</strong> <input type="text" id="modal_bankszamlaszam"></p>
                                    <p><strong>Qr kód:</strong> <input type="text" id="modal_qrcode" onclick="modal_qrcode()" onblur="qrcode_bezar()"></p>
                                </div>
                                
                                <div class="input-pair">
                                    <p><strong>Cím:</strong> <input type="text" id="modal_cim"></p>
                                    <p><strong>Állampolgárság:</strong> <input type="text" id="modal_allam"></p>
                                </div>
                                
                                <div class="input-pair">
                                    <p><strong>Személyigazolvány szám:</strong> <input type="text" id="modal_szemelyi"></p>
                                    <p><strong>Tartózkodási hely:</strong> <input type="text" id="modal_tartozkodas"></p>
                                </div>
                                
                                <div class="input-pair">
                                    <p><strong>Megjegyzés:</strong> <input type="text" id="modal_megjegyzes"></p>
                                </div>
                                
                                <button onclick="mentes()" class="gomb_skin">Mentés</button>

                            </div>
                        </div>
                        <div class="input-pair">
                            <div id="qrcode_id"></div>
                        </div>
                        
                    </div>
                </div>
                </div>                
            </div>
        </div>
        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            <div class="container">
                <form method="POST" id="a_form">
                    @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group mb-3">
                                <label for="Keresztnev">Keresztnév</label>
                                <input type="text" class="form-control" id="Keresztnev" name="Keresztnev" placeholder="Pl. (János)" oninput="ures_e()" required maxlength="255">
                                <small class="form-text text-muted">Kötelező, maximum 255 karakter.</small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="Vezeteknev">Vezetéknév</label>
                                <input type="text" class="form-control" id="Vezeteknev" name="Vezeteknev" placeholder="Pl. (Hunyodi)" oninput="ures_e()" required maxlength="255">
                                <small class="form-text text-muted">Kötelező, maximum 255 karakter.</small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="Szuletesi_datum">Születési dátum</label>
                                <input type="date" class="form-control" id="Szuletesi_datum" name="Szuletesi_datum" min="1900-01-01" onchange="datum()" oninput="ures_e()" required>
                                <small class="form-text text-muted">Kötelező.</small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="Anyja_neve">Anyja neve</label>
                                <input type="text" class="form-control" id="Anyja_neve" name="Anyja_neve" placeholder="Pl. (Tóth Zsuzsanna)" oninput="ures_e()" required maxlength="255">
                                <small class="form-text text-muted">Kötelező, maximum 255 karakter.</small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="Tajszam">TAJ szám</label>
                                <input type="text" class="form-control" id="Tajszam" name="Tajszam" placeholder="Pl. (123456789) Kötőjel nélkül!" oninput="ures_e()" required pattern="[0-9]{9}">
                                <small class="form-text text-muted">Kötelező.</small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="Adoszam">Adószám</label>
                                <input type="text" class="form-control" id="Adoszam" name="Adoszam" placeholder="Pl. (12345678-1-12)"  oninput="ures_e()" required pattern="[0-9]{8}-[0-9]{1}-[0-9]{2}">
                                <small class="form-text text-muted">Kötelező.</small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="Bankszamlaszam">Bankszámlaszám</label>
                                <input type="text" class="form-control" id="Bankszamlaszam" name="Bankszamlaszam" placeholder="Pl. (123456781234567812345678) vagy (1234567812345678)" onchange="hossz()" oninput="ures_e()" maxlength="24" required>
                                <small class="form-text text-muted">Kötelező.</small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="Alapber">Alapbér</label>
                                <input type="text" class="form-control" id="Alapber" name="Alapber" placeholder="Pl. (2000))" maxlength="255" oninput="megnez()" onchange="ures_e()" required>
                                <small class="form-text text-muted">Kötelező, maximum 255 karakter.</small>
                            </div>
                            <div class="form-group mb-3">
                                <input type="hidden" class="form-control p-2" id="qrcode_mezo" name="Qrcode" value="" placeholder="Qr kód helye..."><br>
                                <div id="qrcode_nyilvantartas"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="Cim">Cím</label>
                                <input type="text" class="form-control" id="Cim" name="Cim" placeholder="Pl. (Petőfi út 1.)" oninput="ures_e()" required maxlength="255">
                                <small class="form-text text-muted">Kötelező, maximum 255 karakter.</small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="Allampolgarsag">Állampolgárság</label>
                                <input type="text" class="form-control" id="Allampolgarsag" name="Allampolgarsag" placeholder="Pl. (magyar)" oninput="ures_e()" required maxlength="255">
                                <small class="form-text text-muted">Kötelező, maximum 255 karakter.</small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="Tartozkodasi_hely">Tartózkodási hely</label>
                                <input type="text" class="form-control" id="Tartozkodasi_hely" name="Tartozkodasi_hely" placeholder="Pl. (1234 Valami, Petőfi út 1.)" maxlength="255">
                                <small class="form-text text-muted">Maximum 255 karakter.</small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="Szemelyigazolvany_szam">Személyigazolvány szám</label>
                                <input type="text" class="form-control" id="Szemelyigazolvany_szam" name="Szemelyigazolvany_szam" placeholder="Pl. (123456FF)" oninput="ures_e()" required pattern="^\d{6}[A-Z]{2}$">
                                <small class="form-text text-muted">Kötelező.</small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="Email">Email</label>
                                <input type="email" class="form-control" id="Email" name="Email" placeholder="Pl. (pelda@pelda.hu)" oninput="ures_e()" required maxlength="255">
                                <small class="form-text text-muted">Kötelező.</small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="Telefonszam">Telefonszám</label>
                                <input type="text" class="form-control" id="Telefonszam" name="Telefonszam" placeholder="Pl. (+36301234567)" oninput="ures_e()" required minlength="11" maxlength="12">
                                <small class="form-text text-muted">Kötelező.</small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="Munkakor">Munkakör</label>
                                <input type="text" class="form-control" id="Munkakor" name="Munkakor" placeholder="Pl. (Búrkoló aszisztens)" oninput="ures_e()"  required maxlength="255">
                                <small class="form-text text-muted">Kötelező, maximum 255 karakter.</small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="Megjegyzes">Megjegyzés</label>
                                <input type="text" class="form-control" id="Megjegyzes" name="Megjegyzes" placeholder="Pl. (Példa megjegyzés.)" maxlength="255">
                                <small class="form-text text-muted">Maximum 255 karakter.</small>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary col-5 mx-auto d-block" id="regisztralas_gomb">Regisztráció</button>
                </form>
            </div>
    </div>
    @include('navbarandfooter/footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="css\bootstrap-5.3.3\js\bootstrap.js"></script>
    <script src="js/nyilvantartas.js"></script> 
</body>
</html>
