<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('kepek/icon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-5.3.3/css/bootstrap.css') }}">
    <title>Comproller - Bérszámfejtés</title>
    <link rel="stylesheet" href="{{ asset('css/berszamfejtes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
</head>
<body>
    @include('navbarandfooter/nav')
    <div class="berszamfejtes_tarolo">
        <div class="diagram">
            <div class="diagram_fejlec">
                <div class="diagram_cim">Bérszámfejtés</div>
            </div>
            <form action="{{ route('dolgozok.kereses') }}" method="get">
                <div class="kereses_resz col-8">
                    <input type="text" name="query" placeholder="Keresés dolgozó ID, név vagy munkakör alapján">
                    <button class="btn btn-success" type="submit">Keresés</button>
                </div>
            </form>
            @if($dolgozok->isEmpty() && !request('query'))
                <p>Nincs találat.</p>
            @else
                <div id="talalati_stat" class="talalati_stat elrejtett"></div>
                <div class="table-responsive">
                    <table class="tablazat">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Vezetéknév</th>
                                <th>Keresztnév</th>
                                <th>Munkakör</th>
                                <th>Művelet</th>
                                <th>Összeg</th>
                                <th>Státusz</th>
                            </tr>
                        </thead>
                        <tbody id="tablazat_tbody">
                            @if (!request('query'))
                                @foreach ($dolgozok as $dolgozo)
                                <tr class="table-row">
                                    <td>{{ $dolgozo->DolgozoID }}</td>
                                    <td>{{ $dolgozo->Vezeteknev }}</td>
                                    <td>{{ $dolgozo->Keresztnev }}</td>
                                    <td>{{ $dolgozo->Munkakor }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#berszam_modal">
                                            Vizsgálat
                                        </button>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" disabled> 
                                            <span class="input-group-text">HUF</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="statusz lezarva">Lezárva</span>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                @foreach ($dolgozok as $dolgozo)
                                <tr class="table-row">
                                    <td>{{ $dolgozo->DolgozoID }}</td>
                                    <td>{{ $dolgozo->Vezeteknev }}</td>
                                    <td>{{ $dolgozo->Keresztnev }}</td>
                                    <td>{{ $dolgozo->Munkakor }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#berszam_modal">
                                            Vizsgálat
                                        </button>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" disabled>
                                            <span class="input-group-text">HUF</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="statusz lezarva">Lezárva</span>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
    <div class="modal fade" id="berszam_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: lightblue; color: white;">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Részletes adatok</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <thead>
                            <tr style="background-color: #f8fbff;">
                                <th scope="col">ID</th>
                                <th scope="col">Vezetéknév</th>
                                <th scope="col">Keresztnév</th>
                                <th scope="col">Érkezés</th>
                                <th scope="col">Távozás</th>
                                <th scope="col">Ledolgozott óra</th>
                                <th scope="col">Bér</th>
                                <th scope="col">Összeg</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <form action="">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Egész havi összeg</span>
                            <input type="text" class="form-control" placeholder="Összeg" aria-describedby="button-addon2" disabled>
                            <span class="input-group-text">HUF</span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger">Lezárás</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bezár</button>
                </div>
            </div>
        </div>
    </div>
    <script src="css\bootstrap-5.3.3\js\bootstrap.js"></script>
    <script src="js/munkaido.js"></script> 
    @include('navbarandfooter/footer')
</body>
</html>