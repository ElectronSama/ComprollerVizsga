<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/nyilvantartas.css') }}">
    <div class="container my-5">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item p-2" role="presentation">
                <button class="btn btn-light active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><i class="bi bi-person-fill"></i> Nyilvántartás</button>
            </li>
            <li class="nav-item p-2" role="presentation">
                <button class="btn btn-light" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="bi bi-person-plus-fill"></i> Új dolgozó hozzáadása</button>
            </li>
        </ul>
        <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="home-tab">
                <div class="table-responsive">
                    <table class="table table-hover rounded overflow-hidden">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th scope="col" style="width: 10%" class="py-3">ID</th>
                                <th scope="col" style="width: 25%" class="py-3">Vezetéknév</th>
                                <th scope="col" style="width: 25%" class="py-3">Keresztnév</th>
                                <th scope="col" style="width: 20%" class="py-3">Munkakör</th>
                                <th scope="col" style="width: 20%" class="py-3">Műveletek</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white" style="box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)">
                            @foreach ($Dolgozok as $Dolgozo)
                                <tr class="align-middle">
                                    <td class="fw-bold">{{ $Dolgozo->DolgozoID }}</td>
                                    <td class="text-dark">{{ $Dolgozo->Vezeteknev }}</td>
                                    <td class="text-dark">{{ $Dolgozo->Keresztnev }}</td>
                                    <td><span class="badge bg-secondary text-white">{{ $Dolgozo->Munkakor }}</span></td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-3">
                                            <button class="btn btn-danger btn-sm" onclick="torles({{ $Dolgozo->DolgozoID }})">
                                                <i class="bi bi-trash3-fill"></i> Törlés
                                            </button>
                                            <button class="btn btn-primary btn-sm" onclick="lekeres({{ $Dolgozo->DolgozoID }})">
                                                <i class="bi bi-pencil-fill"></i> Szerkesztés
                                            </button>
                                        </div>
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
                            <div class="input-sor">
                                <div class="input-par">
                                    <p><strong>Vezetéknév:</strong> <input type="text" id="modal_vezeteknev"></p>
                                    <p><strong>Keresztnév:</strong> <input type="text" id="modal_keresztnev"></p>
                                </div>
                                
                                <div class="input-par">
                                    <p><strong>Email:</strong> <input type="email" id="modal_email"></p>
                                    <p><strong>Telefonszám:</strong> <input type="text" id="modal_telefonszam" minlength="11" maxlength="12"></p>
                                </div>
                                
                                <div class="input-par">
                                    <p><strong>Munkakör:</strong> <input type="text" id="modal_munkakor"></p>
                                    <p><strong>Alapbér:</strong> <input type="text" id="modal_alapber"></p>
                                </div>
                                
                                <div class="input-par">
                                    <p><strong>Születési dátum:</strong> <input type="text" id="modal_szuletesi"></p>
                                    <p><strong>Anyja neve:</strong> <input type="text" id="modal_anyja"></p>
                                </div>
                                                                
                                <div class="input-par">
                                    <p><strong>Tajszám:</strong> <input type="text" id="modal_tajszam" maxlength="9"></p>
                                </div>
                            </div>
                            
                            <div class="input-sor">
                                <div class="input-par">
                                    <p><strong>Adószám:</strong> <input type="text" id="modal_adoszam" maxlength="10"></p>
                                </div>
                                <div class="input-par">
                                    <p><strong>Bankszámlaszám:</strong> <input type="text" id="modal_bankszamlaszam" minlength="12" maxlength="24"></p>
                                    <p><strong>Qr kód:</strong> <input type="text" id="modal_qrcode" onclick="modal_qrcode()" onblur="qrcode_bezar()"></p>
                                </div>
                                
                                <button onclick="mentes()" class="btn btn-info">Mentés</button>

                            </div>
                        </div>
                        <div class="input-par">
                            <div id="qrcode_id" style="padding: 10px;"></div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <!-- Profile Tab Content -->
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="container mt-3">
                    <div class="card shadow-sm">
                        <div class="card-header bg-indigo-600 text-dark">
                            <h5 class="card-title mb-0"><i class="bi bi-person-plus-fill me-2"></i>Új dolgozó regisztrálása</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('dolgozo.store') }}" class="needs-validation" id="nyform" novalidate>
                                @csrf
                                <div class="row g-4">
                                    <!-- Személyes adatok -->
                                    <div class="col-md-6">
                                        <div class="card h-100">
                                            <div class="card-header bg-gray-100">
                                                <h6 class="mb-0 text-gray-700"><i class="bi bi-person me-2"></i>Személyes adatok</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label for="Vezeteknev" class="form-label text-gray-600">Vezetéknév</label>
                                                        <input type="text" class="form-control" id="Vezeteknev" name="Vezeteknev" placeholder="Kovács" required oninput="ures_e()">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="Keresztnev" class="form-label text-gray-600">Keresztnév</label>
                                                        <input type="text" class="form-control" id="Keresztnev" name="Keresztnev" placeholder="János" required oninput="ures_e()">
                                                    </div>
                                                    <div class="col">
                                                        <label for="Anyja_neve" class="form-label text-gray-600">Anyja neve</label>
                                                        <input type="text" class="form-control" id="Anyja_neve" name="Anyja_neve" placeholder="Papp Zsuzsanna" required oninput="ures_e()" onblur="ervenyes_nev()">
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="Email" class="form-label text-gray-600">Email cím</label>
                                                        <input type="email" class="form-control" id="Email" name="Email" placeholder="kovacs.janos@example.com" required oninput="ures_e()" onblur="email_e()">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="Telefonszam" class="form-label text-gray-600">Telefonszám</label>
                                                        <input type="tel" class="form-control" id="Telefonszam" name="Telefonszam" placeholder="+36 30 123 4567" required oninput="ures_e()" minlength="11" maxlength="12" onblur="telefonszam()">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="Munkakor" class="form-label text-gray-600">Munkakör</label>
                                                        <input type="text" class="form-control" id="Munkakor" name="Munkakor" placeholder="Fejlesztő" required oninput="ures_e()">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Hivatalos adatok -->
                                    <div class="col-md-6">
                                        <div class="card h-100">
                                            <div class="card-header bg-gray-100">
                                                <h6 class="mb-0 text-gray-700"><i class="bi bi-file-text me-2"></i>Hivatalos adatok</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label for="Szuletesi_datum" class="form-label text-gray-600">Születési dátum</label>
                                                        <input type="date" class="form-control" id="Szuletesi_datum" name="Szuletesi_datum" required oninput="datum()" onblur="ures_e()">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="Alapber" class="form-label text-gray-600">Alapbér</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="Alapber" name="Alapber" placeholder="350000" required onkeyup="megnez()" oninput="ures_e()">
                                                            <span class="input-group-text">Ft</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="Tajszam" class="form-label text-gray-600">TAJ szám</label>
                                                        <input type="text" class="form-control" id="Tajszam" name="Tajszam" placeholder="123-456-789" required oninput="ures_e()" maxlength="9" onkeyup="megnez()">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="Adoszam" class="form-label text-gray-600">Adószám</label>
                                                        <input type="text" class="form-control" id="Adoszam" name="Adoszam" placeholder="8123456789" required oninput="ures_e()" maxlength="10" onkeyup="megnez()">
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="Bankszamlaszam" class="form-label text-gray-600">Bankszámlaszám</label>
                                                        <input type="text" class="form-control" id="Bankszamlaszam" name="Bankszamlaszam" placeholder="11773377-12345678" required oninput="ures_e()" minlength="16" maxlength="24" onkeyup="megnez()">
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="qrcode_mezo" class="form-label text-gray-600">QR kód</label>
                                                        <input type="hidden" class="form-control p-2" id="qrcode_mezo" name="Qrcode" value="" placeholder="Qr kód helye..."><br>
                                                        <div id="qrcode_nyilvantartas"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Gombok a regisztrálás-->
                                <div class="text-start mt-4 d-flex gap-3">
                                    <button type="submit" id="felvitel_gomb" class="btn btn-dark text-white d-flex align-items-center px-3">
                                        <i class="bi bi-person-plus-fill me-2"></i>Dolgozó regisztrálása
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/nyilvantartas.js') }}"></script>
</x-app-layout>