<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">
    <link rel="stylesheet" href="{{ asset('css\bootstrap-5.3.3\css\bootstrap.css') }}">
    <title>Regisztráció</title>
    <link rel="stylesheet" href="css/regisztracio.css">
</head>
<body>
    @include('navbarandfooter/nav')
    <div class="containerr">
        <h1>Regisztráció</h1>
        
        <div class="form_group">
            <label for="felhasznalo_nev">Felhasználónév</label>
            <input type="text" id="felhasznalo_nev" placeholder="Írja be a felhasználónevét">
        </div>

        <div class="form_group">
            <label for="jog">Jogkör</label>
            <input type="text" id="felhasznalo_nev" placeholder="Írja be a jogkörét">
        </div>

        <div class="form_group">
            <label for="jelszo">Jelszó</label>
            <input type="password" id="jelszo" placeholder="Írja be a jelszavát">
            <img src="kepek/szem_be.png" onclick="megnez('jelszo', this)" class="jelszo_icon">
        </div>

        <div class="form_group">
            <label for="jelszo_megerosites">Jelszó megerősítése</label>
            <input type="password" id="jelszo_megerosites" placeholder="Írja be újra a jelszavát">
            <img src="kepek/szem_be.png" onclick="megnez('jelszo_megerosites', this)" class="jelszo_icon">
        </div>

        <button onclick="regisztracio()">Regisztráció</button>
        <div id="uzenet" class="message"></div>
    </div>

    <script src="js/regisztracio.js"></script> 
    @include('navbarandfooter/footer')
    <script src="css\bootstrap-5.3.3\js\bootstrap.js"></script>
</body>
</html>