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
    <style>
.berszamfejtes_tarolo {
    max-width: 1200px;
    margin: 20px auto;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

.diagram {
    border: 2px solid lightblue;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.diagram_fejlec {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: lightblue;
    padding: 0 20px;
}

.diagram_cim {
    color: white;
    padding: 12px 0;
    font-size: 1.5rem;
    font-weight: 600;
    letter-spacing: 1px;
}

.kinyitas_gomb {
    padding: 8px 15px;
    background-color: white;
    color: #5fa3b9;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    transition: all 0.3s;
}

.kinyitas_gomb:hover {
    background-color: #f0f0f0;
    box-shadow: 0 0 5px rgba(255, 255, 255, 0.3);
}

.kereses_resz {
    padding: 15px 20px;
    background-color: #f8fbff;
    border-bottom: 1px solid #eee;
    display: flex;
    gap: 10px;
}

.kereses_resz input[type="text"] {
    padding: 8px 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    flex-grow: 1;
    max-width: 300px;
}

.kereses_resz input[type="button"] {
    padding: 8px 15px;
    background-color: lightblue;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s;
}

.kereses_resz input[type="button"]:hover {
    background-color: #5fa3b9;
}

.tablazat {
    width: 100%;
    border-collapse: collapse;
}

.tablazat th {
    background-color: #f8fbff;
    padding: 12px;
    text-align: center;
    font-weight: 600;
    border-bottom: 2px solid #eee;
}

.tablazat td {
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #eee;
}

.tablazat tr:hover {
    background-color: #f9f9f9;
}

.btn-primary {
    background-color: lightblue;
    border-color: lightblue;
}

.btn-primary:hover {
    background-color: #5fa3b9;
    border-color: #5fa3b9;
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
}

.statusz {
    padding: 5px 10px;
    border-radius: 15px;
    font-size: 0.85rem;
    font-weight: 500;
    display: inline-block;
}

.lezarva {
    background-color: #d4edda;
    color: #155724;
}

.folyamatban {
    background-color: #fff3cd;
    color: #856404;
}

        .osszeg_mezo {
            padding: 5px 10px;
            text-align: center;
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 4px;
            color: #495057;
            margin-top: 8px;
            width: 150px;
        }

        .elrejtett {
            display: none !important;
        }

        .talalati_stat {
            padding: 8px 15px;
            margin-top: 10px;
            background-color: #e9f7fb;
            border-radius: 5px;
            font-size: 0.9rem;
            color: #5fa3b9;
        }
    </style>
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
                                <th scope="col">Bónusz</th>
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
                    <button type="button" class="btn btn-primary">Exportálás PDF</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bezár</button>
                </div>
            </div>
        </div>
    </div>
    <script src="css\bootstrap-5.3.3\js\bootstrap.js"></script>
    @include('navbarandfooter/footer')
</body>
</html>