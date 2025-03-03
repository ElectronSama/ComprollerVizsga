<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">
    <link rel="stylesheet" href="{{ asset('css\bootstrap-5.3.3\css\bootstrap.css') }}">
    <title>Comproller - Profil</title>
    <link rel="stylesheet" href="css/profil.css">
</head>
<body>
    @include('navbarandfooter/nav')
    <div class="containerr">
        <h1>Fiók Beállítások</h1>
        <div class="tabs">
            <div class="tab active" onclick="switchTab('username')">Felhasználónév</div>
            <div class="tab" onclick="switchTab('password')">Jelszó</div>
        </div>
        
        <div id="username" class="tab-content active">

            <div class="form-group">
                <label for="current-username">Jelenlegi felhasználónév</label>
                <input type="text" id="current-username" placeholder="Írja be a felhasználónevét">
            </div>
            
            <div class="form-group">
                <label for="new-username">Új felhasználónév</label>
                <input type="text" id="new-username" placeholder="Írja be az új felhasználónevet">
            </div>

            <div class="form-group">
                <label for="confirm-password-username">Jelszó megerősítése</label>
                <input type="password" id="confirm-password-username" placeholder="Írja be a jelszavát">
                <img src="kepek/szem_be.png" onclick="megnez('confirm-password-username', this)" class="jelszo-icon">
            </div>

            <button onclick="changeUsername()">Felhasználónév Módosítása</button>
            <div id="username-message" class="message success-message">Felhasználónév sikeresen módosítva!</div>
        </div>
        
        <div id="password" class="tab-content">
            <div class="form-group">
                <label for="current-password">Jelenlegi jelszó</label>
                <input type="password" id="current-password" placeholder="Írja be a jelenlegi jelszavát">
                <img src="kepek/szem_be.png" onclick="megnez('current-password', this)" class="jelszo-icon">
            </div>
            <div class="form-group">
                <label for="new-password">Új jelszó</label>
                <input type="password" id="new-password" placeholder="Írja be az új jelszavát">
                <img src="kepek/szem_be.png" onclick="megnez('new-password', this)" class="jelszo-icon">
            </div>
            <div class="form-group">
                <label for="confirm-new-password">Új jelszó megerősítése</label>
                <input type="password" id="confirm-new-password" placeholder="Írja be újra az új jelszavát">
                <img src="kepek/szem_be.png" onclick="megnez('confirm-new-password', this)" class="jelszo-icon">
            </div>
            <button onclick="changePassword()">Jelszó Módosítása</button>
            <div id="password-message" class="message">Jelszó sikeresen módosítva!</div>
        </div>
    </div>

    <script src="js/profil.js"></script> 
    @include('navbarandfooter/footer')
    <script src="css\bootstrap-5.3.3\js\bootstrap.js"></script>
</body>
</html>
