let a_form = document.getElementById("a_form");
a_form.reset();

let lekerdezes_form = document.getElementById("atadas_form");
lekerdezes_form.reset();

let hozzadas_gomb = document.getElementById("add-button");
let dolgozoid_mezo = document.getElementById("dolgozoid_mezo");
let idoszakos_gomb = document.getElementById("flexCheckDefault");
let datum_kezd = document.getElementById("datum_kezd");
let datum_befejez = document.getElementById("datum_befejez");
let phpgomb = document.getElementById("phpgomb");

idoszakos_gomb.checked = false;
datum_befejez.disabled = true;
hozzadas_gomb.disabled = true;
dolgozoid_mezo.disabled = true;
phpgomb.disabled = true;

function validalas()
{

    let ber_input = document.getElementById("ber_input");
    let veg_input = document.getElementById("vegosszeg_input");
    let ora_input = document.getElementById("ora_input");
    let bonusz_input = document.getElementById("bonusz_input");
    let szam_mezo = document.getElementById("dolgozoid_mezo");

    if (isNaN(ber_input.value))
    {

        alert("Csak számok!");

        ber_input.value = "";

    }
    else if (isNaN(veg_input.value))
    {

        alert("Csak számok!");

        veg_input.value = "";

    }
    else if (isNaN(ora_input.value))
    {

        alert("Csak számok!");

        ora_input.value = "";

    }
    else if (isNaN(bonusz_input.value))
    {

        alert("Csak számok!");

        bonusz_input.value = "";

    }
    else if (isNaN(szam_mezo.value))
    {

        alert("Csak számok!");

        szam_mezo.value = "";
        
    }
    else if (ora_input.value < 1 || ora_input.value > 24)
    {

        alert("Csak 1-től 24 óra!");

        ora_input.value = "";

    }

}

function lekeres_ellenorzes()
{

    let id_mezo = document.getElementById("exampleDataList");
    datum_kezd = document.getElementById("datum_kezd");

    if (isNaN(id_mezo.value) || id_mezo.value < 0 || !datum_kezd.value)
    {

        phpgomb.disabled = true;

    }
    else
    {

        phpgomb.disabled = false;

    }

}

function mezo_ellenorzes() // Mezők tiltása és feloldása szükség esetén.
{

    let date = document.getElementById("date");
    let date2 = document.getElementById("date2");
    let time = document.getElementById("time");
    let time2 = document.getElementById("time2");
    let hozzadas_gomb = document.getElementById("add-button");
    let dolgozoid_mezo = document.getElementById("dolgozoid_mezo");
    let ora_input = document.getElementById("ora_input");
    let ber_input = document.getElementById("ber_input");
    let bonusz_input = document.getElementById("bonusz_input");
    let vegosszeg_input = document.getElementById("vegosszeg_input");

    if (date.value == "" || date2.value == "" || time.value == "" || time2.value == "" || ora_input.value == "" 
        || ber_input.value == "" || bonusz_input.value == "" || vegosszeg_input.value == "")
    {

        hozzadas_gomb.disabled = true;
        dolgozoid_mezo.disabled = true;

    }
    else
    {

        hozzadas_gomb.disabled = false;
        dolgozoid_mezo.disabled = false;

    }

}

function lezar() // Mező vissza zárása gombnyomásra.
{

    let hozzadas_gomb = document.getElementById("add-button");
    let dolgozoid_mezo = document.getElementById("dolgozoid_mezo");

    hozzadas_gomb.disabled = true;
    dolgozoid_mezo.disabled = true;

}

function vissza()
{

    
    let atadas_form = document.getElementById("atadas_form");

    atadas_form.reset();

}

function datum_szures() // Dátumos mezők ellenörzése.
{

    let keress = document.getElementById("exampleDataList").value;
    let datum_kezd = document.getElementById("datum_kezd").value;

    if (keress != "" && datum_kezd != "")
    {

        setTimeout(vissza,2000);

    }

}

function idoszakos() // Időszakos lekérdezéshez a mezők lekezelése.
{

    let kocka = document.getElementById("flexCheckDefault");
    let mezo = document.getElementById("datum_befejez");

    if(kocka.checked === true)
    {

        mezo.disabled = false;

    }
    else if (kocka.checked === false)
    {

        mezo.value = "";
        mezo.disabled = true;       

    }

}

function jovo() // Manuális végidő lekezelése.
{
    let ma = new Date();

    let Szuletesi_datum = document.getElementById("date");
    let Szuletesi_datum2 = document.getElementById("date2");
    let Szuletesi_datum3 = document.getElementById("datum_kezd");
    let Szuletesi_datum4 = document.getElementById("datum_befejez");

    let uj_datum = new Date(Szuletesi_datum.value);
    let uj_datum2 = new Date(Szuletesi_datum2.value);
    let uj_datum3 = new Date(Szuletesi_datum3.value);
    let uj_datum4 = new Date(Szuletesi_datum4.value);

    if (uj_datum > ma) 
    {
        alert("Az érték nem lehet a jövőben!");
        Szuletesi_datum.value = "";
    }
    else if (uj_datum2 > ma)
    {

        alert("Az érték nem lehet a jövőben!");
        Szuletesi_datum2.value = "";

    }
    else if (uj_datum3 > ma)
    {

        alert("Az érték nem lehet a jövőben!");
        Szuletesi_datum3.value = "";

    }
    else if (uj_datum4 > ma)
    {

        alert("Az érték nem lehet a jövőben!");
        Szuletesi_datum4.value = "";

    }
}

function ora_frissites() {
    let most = new Date();
    let orak = most.getHours().toString().padStart(2, '0');
    let percek = most.getMinutes().toString().padStart(2, '0');
    let mp = most.getSeconds().toString().padStart(2, '0');
    document.getElementById("clock").textContent = `${orak}:${percek}:${mp}`;
}
setInterval(ora_frissites, 1000);
ora_frissites();

document.getElementById("add-button").addEventListener("click", function() {
    let dolgozo = document.getElementById("dolgozoid_mezo").value;
    let munkanap = document.getElementById("date").value;
    let vegnap = document.getElementById("date2").value;
    let munka_kezdete = document.getElementById("time").value;
    let hiba_uzenet = document.getElementById("error-message");
    let munka_befejezese = document.getElementById("time2").value;

    hiba_uzenet.textContent = "";
    hiba_uzenet.classList.add("d-none");

    if (!munkanap && !vegnap) {
        hiba_uzenet.textContent = "Hiba: A dátumok megadása kötelező!";
        hiba_uzenet.classList.remove("d-none");
        return;
    }

    if (dolgozo && munkanap && vegnap && munka_kezdete) {

        let tabla = document.getElementById("info-table").getElementsByTagName('tbody')[0];
        let sor_szama = tabla.rows.length + 1;
        let uj_sor = tabla.insertRow();
        uj_sor.innerHTML = `
            <td>${sor_szama}</td>
            <td>${dolgozo}</td>
            <td>${munkanap}</td>
            <td>${vegnap}</td>
            <td>${munka_kezdete}</td>
            <td>${munka_befejezese}</td>
        `;
    }

    setTimeout(function() {
        let mezok = ["dolgozoid_mezo", "date", "date2", "time", "time2","ora_input","ber_input","bonusz_input","vegosszeg_input"];
        mezok.forEach(function(i) {
            document.getElementById(i).value = "";
        });
    }, 1000);
});

document.getElementById("dolgozoid_mezo").addEventListener("change", function() { // Mező vizsgálása hogy átadjuk a paramétereket.
    let dolgozoid = this.value.trim();
    if (dolgozoid) {
        dolgozoinfo(dolgozoid); 
    }
});

function dolgozoinfo(dolgozoid) 
{

    let kivalasztott_id = dolgozoid;

    let idopont_input = document.getElementById("date").value;
    let idopont_input2 = document.getElementById("date2").value;
    let idopont_ido = document.getElementById("time").value;
    let idopont_ido2 = document.getElementById("time2").value;
    let dolgozoid_mezo = document.getElementById("dolgozoid_mezo").value; /* Kiszedjük a bemeneti adatokat. */
    let ora_input = document.getElementById("ora_input").value;
    let ber_input = document.getElementById("ber_input").value;
    let bonusz_input = document.getElementById("bonusz_input").value;
    let vegosszeg_input = document.getElementById("vegosszeg_input").value;

    let form_adat = new URLSearchParams(); /* Form kompatibilissá állitsuk a változót. */
    form_adat.append("action", "lekeres"); /* Hozzáfüzünk egy parancsszót. */
    form_adat.append("kivalasztott_id", kivalasztott_id);
    form_adat.append("idopont_input", idopont_input);
    form_adat.append("idopont_input2", idopont_input2);
    form_adat.append("idopont_ido", idopont_ido);
    form_adat.append("idopont_ido2", idopont_ido2);
    form_adat.append("dolgozoid_mezo", dolgozoid_mezo); /* Hozzáfüzzük a küldendő adatokat. */
    form_adat.append("ora_input", ora_input);
    form_adat.append("ber_input", ber_input);
    form_adat.append("bonusz_input", bonusz_input);
    form_adat.append("vegosszeg_input", vegosszeg_input);

    fetch("php/mfeltoltes.php", /* Megcélozzuk a php-t. */ 
    {
        method: "POST", /* Küldés módja. */
        headers: { "Content-Type": "application/x-www-form-urlencoded" }, /* Formája. */
        body: form_adat /* Mit küldünk. */
    })
}
