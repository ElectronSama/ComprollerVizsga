<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-5.3.3/css/bootstrap.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('kepek/icon.png') }}">
    <title>Irányítópult - Comproller</title>
    <link rel="stylesheet" href="{{ asset('css/iranyitopult.css') }}">
</head>
<body>
    @include('navbarandfooter/nav')

    <div class="iranyitopult_tarolo">
        <div class="kartyak_tarolo">
            <div class="kartya">
                <div class="kartya_cim">Összes</div>
                <div class="kartya_ertek">{{ $Dolgozokszama }}</div>
                <div class="kartya_leiras">Az összes dolgozó száma a nyilvántartásban.</div>
            </div>
            <div class="kartya d-none d-sm-block">
                <div class="kartya_cim">Összes</div>
                <div class="kartya_ertek">{{ $Osszesmunkakor }}</div>
                <div class="kartya_leiras">Az összes munkakör a nyilvántartásban.</div>
            </div>
            <div class="kartya d-none d-sm-block">
                <div class="kartya_cim">Dátum</div>
                <div class="kartya_ertek" id="datum"></div>
                <script>
                    const datum = new Date();
                    document.getElementById("datum").innerHTML = datum.toLocaleDateString();
                </script>
            </div>
        </div>
        @include('items/emberek_diagram')
        <div class="diagram_tarolo">
            <div class="diagram">
                <div class="diagram_cim">Legutóbbi Események</div>
                <table class="tablazat">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Dátum</th>
                            <th>Esemény neve</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Esemenyek as $Esemeny)
                            <tr>
                                <td>{{ $Esemeny->id }}</td>
                                <td>{{ $Esemeny->datum }}</td>
                                <td>{{ $Esemeny->esemeny_neve }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="diagram">
                <div class="diagram_cim">Utóljára felvitt munkavállalók</div>
                <table class="tablazat">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Vezetéknév</th>
                        <th>Keresztnév</th>
                        <th>Munkakör</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Dolgozok as $Dolgozo)
                        <tr>
                            <td>{{ $Dolgozo->DolgozoID }}</td>
                            <td>{{ $Dolgozo->Vezeteknev }}</td>
                            <td>{{ $Dolgozo->Keresztnev }}</td>
                            <td>{{ $Dolgozo->Munkakor }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>               
    </div>
    @include('navbarandfooter/footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
</body>
</html>