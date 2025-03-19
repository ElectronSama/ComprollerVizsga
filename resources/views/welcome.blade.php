<!DOCTYPE html>
<html lang="hu">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">
    <link rel="stylesheet" href="{{ asset('css\bootstrap-5.3.3\css\bootstrap.css') }}">
    <meta charset="UTF-8">
    <title>Comproller - Főoldal</title>
    <link rel="stylesheet" href="{{ asset('css/fooldal.css') }}">
    <style>

        body
        {

            background-image: url('{{ asset('kepek/hatter.png')}}');

        }

    </style>
</head>
<body>
    @include('navbarandfooter/nav')

    <?php

        $szerver = "localhost";
        $felhasznalo = "root";
        $jelszo = "";
        $adatbazis = "comproller";

        $kapcsolodas = new mysqli($szerver, $felhasznalo, $jelszo, $adatbazis);

        if ($kapcsolodas->connect_error) 
        {
            die("Kapcsolódási hiba: " . $kapcsolodas->connect_error);
        }
    ?>

    <div class="wrapper">
        <div class="form-wrapper sign-in">
            <form action="">
                <h2>Bejelentkezés</h2>
                <div class="input-group">
                    <input type="text" id="b_nev" required>
                    <label>Felhasználónév</label>
                </div>
                <div class="input-group">
                    <input type="password" id="password-signin" required>
                    <label>Jelszó</label>
                    <img src="{{ asset('kepek/szem_be.png') }}" onclick="megnez('password-signin', this)" class="jelszo-icon">
                </div>
                <div class="text-center">
                    <button class="btn btn-primary btn-lg" type="button" onclick="bejelentkezes()">Bejelentkezés</button>
                </div>
            </form>
        </div>
    </div>

    <?php

        $sql = "SELECT felhasznalonev, jelszo, szerep FROM felhasznalok"; // Felhasználó adatainak lekérése.
        $eredmeny = $kapcsolodas->query($sql);

        if ($eredmeny->num_rows > 0) 
        {
            $adat = [];
            while($sor = $eredmeny->fetch_assoc()) 
            {
                $adat[] = [
                    'felhasznalonev' => $sor["felhasznalonev"],
                    'jelszo' => $sor["jelszo"],
                    'szerep' => $sor["szerep"]
                ];
            }
        } 
        else 
        {
            $adat = [];
        }

        $kapcsolodas->close();
    
    ?>

    @include('navbarandfooter/footer')
    <script src="css\bootstrap-5.3.3\js\bootstrap.js"></script>
    <script src="js/fooldal.js"></script>

    <script>

        function bejelentkezes() 
        {
            let felhasznalok = [];
            let jelszavak = [];
            let szerepek = [];

            let adat = <?php echo json_encode($adat); ?>; // JSON-á konvertálás.
            adat.forEach(function(felhasznalo) // Felhasználó tömb létrehozása.
            {
                felhasznalok.push(felhasznalo.felhasznalonev);
                jelszavak.push(felhasznalo.jelszo);
                szerepek.push(felhasznalo.szerep);
            });

            let felhasznalonev = document.getElementById("b_nev").value;
            let jelszo = document.getElementById("password-signin").value;

            let ervenyes = false;
            let admin = false;

            for (let i = 0; i < felhasznalok.length; i++)
            {
                if (felhasznalok[i] == felhasznalonev && jelszavak[i] == jelszo) // Ha minden megegyezik...
                {
                    ervenyes = true;
                    if (szerepek[i] == "hr" || szerepek[i] == "admin")
                    {
                        admin = true; // Minden esetben admin lesz a felhasználó.
                    }
                }
            }

            if (ervenyes == true)
            {
                if (admin == true)
                {                   
                    fetch('/admin', 
                    {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content // Így beállít egy token-t.
                        },
                        body: JSON.stringify({ admin: true })
                    })
                    .then(function(valasz) 
                    {
                        if (valasz.ok) 
                        {
                            window.location.href = '/dashboard';
                        } 
                        else 
                        {
                            alert("Hiba történt a jogosultság frissítése közben.");
                        }
                    })
                    .catch(function(hiba) 
                    {
                        console.error('Hiba:', hiba);
                    });
                }
            }
            else
            {
                alert("Érvénytelen adatok!");
            }

            // *** Input mezők törlése minden esetben ***
            document.getElementById("b_nev").value = "";
            document.getElementById("password-signin").value = "";
        }

    </script>
</body>
</html>
