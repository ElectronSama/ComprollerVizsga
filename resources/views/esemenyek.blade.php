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
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "comproller";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) 
        {
            die("Kapcsolódási hiba: " . $conn->connect_error);
        }
    ?>
    
    <div id="kozepre">
        <h1>Naptár és események</h1>

        <div class="d-none d-sm-block" id="naptar_kerete">
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
                    $result = $conn->query($sql);

                    if ($result-> num_rows > 0) // Sorok számának vizsgálata.
                    {
                        while ($row = $result->fetch_assoc()) // Tömbként kezelés.
                        {
                            echo '<tr>';
                            echo '    <td data-label="Esemény Neve">' . htmlspecialchars($row["esemeny_neve"]) . '</td>'; // htmlspecialchars = biztonságos kiírás.
                            echo '    <td data-label="Dátum">' . htmlspecialchars($row["datum"]) . '</td>';
                            echo '    <td data-label="Műveletek">';
                            echo '        <form action="php/torles.php" method="post" id="form2" target="/events">';
                            echo '            <input type="hidden" name="esemeny_neve" value="' . htmlspecialchars($row["esemeny_neve"]) . '" >';
                            echo '            <input type="submit" class="gomb_skin" value="Törlés" onclick="oldal_frissites()">';
                            echo '        </form>';                            
                            echo '    </td>';
                            echo '</tr>';
                        }
                    }

                    $conn->close();

                ?>

            </table>
        </div>

        <div id="esemeny_modal" style="display: none;">
            <div class="modal_tartalom">
                <h2 id="datum_cim">Új esemény hozzáadása</h2>
                <form action="php/hozzaadas.php" method="post" onsubmit="return ellenorzes();" target="/events" id="form1">
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
    <script>

let aktualis_ev = new Date().getFullYear();
let aktualis_honap = new Date().getMonth();
let kivalasztott_datum = null;
let naptar_esemenyek = {}; /* Események tömb. */

function cimfrissites() 
{
    let honapok = [
        'Január', 'Február', 'Március', 'Április', 'Május', 'Június', 
        'Július', 'Augusztus', 'Szeptember', 'Október', 'November', 'December'
    ];
    document.getElementById('naptar_cim').textContent = 
        `${honapok[aktualis_honap]} ${aktualis_ev}`; /* Naptáron a dátum beállitása. */
}

function elozo_honap()  /* Előző hónap kiszámitása. */
{
    aktualis_honap--;
    if (aktualis_honap < 0)  /* Ha a hónap már 0 akkor vissza állitás az előző évire. */
    {
        aktualis_honap = 11;
        aktualis_ev--;
    }
    naptar_frissites(); /* Naptár frissítése a változtatásokhoz. */
}

function kovetkezo_honap() /* Forditott... */
{
    aktualis_honap++;
    if (aktualis_honap > 11) 
    {
        aktualis_honap = 0;
        aktualis_ev++;
    }
    naptar_frissites();
}

function naptar_frissites() 
{
    cimfrissites();
    
    let naptar_container = document.getElementById('naptar_container');
    naptar_container.innerHTML = ''; /* A naptár belsejét kitöröljük... */

    let honap_elso_napja = new Date(aktualis_ev, aktualis_honap, 1); /* Első nap beállitása... */
    let honap_utolso_napja = new Date(aktualis_ev, aktualis_honap + 1, 0); /* A következő hónap 0-adik napjára hivatkozunk mert a napokat 1-től számozzuk és a 0 az utolsó nap a hónap-ba. */

    let elso_nap_indexe = honap_elso_napja.getDay() === 0 ? 7 : honap_elso_napja.getDay(); /* Vasárnap az garantáltan 7-edik nap lesz a hétbe. */
     
    for (let i = 1; i < elso_nap_indexe; i++) /* Üres napok beállitása (DOM CSS). */
    {
        let ures_nap = document.createElement('div');
        ures_nap.classList.add('naptar_nap');
        ures_nap.style.backgroundColor = '#f9f9f9';
        ures_nap.style.color = '#cccccc';
        naptar_container.appendChild(ures_nap); /* Hozzáadás a naptárhoz. */
    }

    /* Üres napok az elrendezéshez vannak jelen. */

    for (let nap = 1; nap <= honap_utolso_napja.getDate(); nap++) /* Utolsó napig végigmegyünk... */
    {
        let nap_elem = document.createElement('div');
        nap_elem.classList.add('naptar_nap');
        nap_elem.textContent = nap; /* A napot beállitjuk... */
        
        let datum = `${aktualis_ev}-${String(aktualis_honap+1).padStart(2, '0')}-${String(nap).padStart(2, '0')}`; /* YYYY-MM-DD formába formázás, mindig 2-jegyüek lesznek a számok. */
        nap_elem.setAttribute('data-datum', datum); /* Attribútum megadása, szükség esetén. */
        
        if (naptar_esemenyek[datum]) /* Ha van esemény, létrehozzuk és hozzáadjuk az oldalhoz. */
        {
            naptar_esemenyek[datum].forEach(function(esemeny)
            {
                let esemeny_elem = document.createElement('div');
                esemeny_elem.classList.add('esemeny');
                esemeny_elem.textContent = esemeny;
                nap_elem.appendChild(esemeny_elem);
            });
        }

        nap_elem.addEventListener('click', datum_valasztas); /* Kattintási esemény hozzáadása. */
        naptar_container.appendChild(nap_elem); /* Hozzáadás a naptárhoz. */
    }

    esemeny_frissites();
}

function datum_valasztas(esemeny) /* Ha rámegyünk egy napra kicseréli az adatokat majd megjeleniti. */
{
    let elozo = document.querySelector('.aktiv_nap');
    if (elozo) elozo.classList.remove('aktiv_nap');

    esemeny.currentTarget.classList.add('aktiv_nap');
    kivalasztott_datum = esemeny.currentTarget.getAttribute('data-datum');

    document.getElementById('datum_cim').textContent = kivalasztott_datum;
    document.getElementById('modal_datum_input').value = kivalasztott_datum;
    document.getElementById('esemeny_modal').style.display = 'block';
}

function esemeny_hozzaadasa() 
{
    let esemeny_input = document.getElementById('esemeny_bevitel');
    let esemeny = esemeny_input.value.trim();

    if (esemeny && kivalasztott_datum) /* Ha van esemény és nem üres a dátum... */
    {
        if (!naptar_esemenyek[kivalasztott_datum]) /* Ha nincs tömb, létrehozzuk az eseményeknek. */
        {
            naptar_esemenyek[kivalasztott_datum] = [];
        }

        naptar_esemenyek[kivalasztott_datum].push(esemeny); /* Eltároljuk az eseményt a naphoz majd kitöröljkük amit beírtunk és frissítünk mindent. */
        
        esemeny_bevitel.value = '';
        modal_bezarasa();
        naptar_frissites();
    }
}

function esemeny_frissites() 
{
    let tbody = document.getElementById('osszes_esemeny');
    tbody.innerHTML = ''; /* Események törlése hogy ne legyenek duplán. */

    Object.keys(naptar_esemenyek).forEach(function(datum) /* Végig megyünk az eseményeken és a dátumon... */
    {
        naptar_esemenyek[datum].forEach(function(esemeny)
        {
            let sor = tbody.insertRow();
            sor.insertCell(0).textContent = datum;
            sor.insertCell(1).textContent = esemeny; /* Ezeket kiíratjuk egymás mellett. */
            
            let torles_gomb = document.createElement('button');
            torles_gomb.textContent = 'Törlés';
            torles_gomb.classList.add('gomb_skin'); /* Definilunk egy törlés gombot. */
            torles_gomb.onclick = function() 
            {
                naptar_esemenyek[datum] = naptar_esemenyek[datum].filter(function(e) /* Kiszürjük az eseményt... */
                {
                    return e !== esemeny;
                });

                if (naptar_esemenyek[datum].length === 0) /* Ha a dátumnak nincsennek eseményei, kitöröljük. */
                {
                    delete naptar_esemenyek[datum];
                }
                naptar_frissites();
            };
            
            let muvelet = sor.insertCell(2); /* A törlés gomb lesz a 3-adik elem a sorba. */
            muvelet.appendChild(torles_gomb); /* Hozzáadjuk a törlés gombot az eseményhez a legvégén. */
        });
    });
}

function modal_megnyitasa() 
{
    document.getElementById("esemeny_modal").style.display = "block";
}

function modal_bezarasa() 
{
    document.getElementById("esemeny_modal").style.display = "none";
}

function ellenorzes() 
{
    let leiras = document.getElementById("esemeny_bevitel").value.trim();
    let datum = document.getElementById("modal_datum_input").value.trim();

    if (leiras === "" || datum === "") 
    {
        alert("Kérjük, töltsd ki az összes mezőt!");
        return false;
    }

    return true;

}

naptar_frissites();

function oldal_frissites()
{

    window.location.href = '/events';

}

/* Formok visszálitása. */
let form1 = document.getElementById("form1");
let form2 = document.getElementById("form2");

form1.reset();
form2.reset();

    </script>
</body>
</html>
