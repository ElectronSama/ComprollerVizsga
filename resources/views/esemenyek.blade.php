<!DOCTYPE html>
<html lang="hu">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('kepek/icon.png') }}">
    <meta charset="UTF-8">
    <title>Comproller - Események</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-5.3.3/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/esemenyek.css') }}">
</head>
<body>
    @include('navbarandfooter/nav')

    <?php // Belsős csatlakozás adatbázishoz.

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
   
    <div id="kozepre">
        <h1>Naptár és események</h1>

        <div id="naptar_kerete">
            <div id="naptar_navigacio">
                <button onclick="elozo_honap()" class="nav_gomb">Előző</button>
                <div id="naptar_cim"></div>
                <button onclick="kovetkezo_honap()" class="nav_gomb">Következő</button>
            </div>

            <div class="het_napjai">
                <div>Hétfő</div>
                <div>Kedd</div>
                <div>Szerda</div>
                <div>Csütörtök</div>
                <div>Péntek</div>
                <div>Szombat</div>
                <div>Vasárnap</div>
            </div>

            <div id="naptar_container"></div>
        </div>

        <div id="esemeny_lista">
            <table>
                <thead>
                    <tr>                    
                        <th>Esemény</th>
                        <th>Dátum</th>
                        <th>Műveletek</th>
                    </tr>
                </thead>
                <tbody id="osszes_esemeny"></tbody>
                <?php

                    $sql = "SELECT id, esemeny_neve, datum FROM esemenyek"; // Események kiírása.
                    $eredmeny = $kapcsolodas->query($sql);

                    if ($eredmeny-> num_rows > 0) // Sorok számának vizsgálata.
                    {
                        while ($sor = $eredmeny->fetch_assoc()) // Tömbként kezelés.
                        {
                            echo '<tr>';
                            echo '    <td data-label="Esemény Neve">' . $sor["esemeny_neve"] . '</td>';
                            echo '    <td data-label="Dátum">' . $sor["datum"] . '</td>';
                            echo '    <td data-label="Műveletek">';
                            echo '        <form action="php/torles.php" method="post" id="form2" target="/events">';
                            echo '            <input type="hidden" name="esemeny_neve" value="' . $sor["esemeny_neve"] . '" >';
                            echo '            <input type="submit" class="gomb_skin" value="Törlés" onclick="oldal_frissites()">';
                            echo '        </form>';                            
                            echo '    </td>';
                            echo '</tr>';
                        }
                    }

                    $kapcsolodas->close();

                ?>

            </table>
        </div>

        <div id="esemeny_modal" style="display: none;">
            <div class="modal_tartalom">
                <h2 id="datum_cim">Új esemény hozzáadása</h2>
                <form action="php/hozzaadas.php" method="post" target="/events" id="form1">
                    <input type="hidden" name="datum" id="modal_datum_input">
                    <input type="text" name="esemeny_leiras" id="esemeny_bevitel" placeholder="Esemény leírása" 
                        style="width: 100%; padding: 10px; margin-bottom: 10px;" required>
                    <button type="submit" class="gomb_skin" onclick="oldal_frissites()">Mentés</button>
                    <button type="button" onclick="modal_bezarasa()" class="gomb_skin">Mégsem</button>
                </form>
            </div>
        </div>


    </div>

@include('navbarandfooter/footer')
<script src="css\bootstrap-5.3.3\js\bootstrap.js"></script>
<script src="js/esemenyek.js"></script> 
</body>
</html>