let felvitel_gomb = document.getElementById("felvitel_gomb");

felvitel_gomb.disabled = true;

let nyform = document.getElementById("nyform");

nyform.reset();

let hibas_bank = [17,18,19,20,21,22,23];
let jo_hossz = [1,2];

function ures_e() 
{
    let Keresztnev = document.getElementById("Keresztnev").value.trim();
    let Vezeteknev = document.getElementById("Vezeteknev").value.trim();
    let Szuletesi_datum = document.getElementById("Szuletesi_datum").value;
    let Anyja_neve = document.getElementById("Anyja_neve").value;
    let Tajszam = document.getElementById("Tajszam").value;
    let Adoszam = document.getElementById("Adoszam").value;
    let Bankszamlaszam = document.getElementById("Bankszamlaszam").value;
    let Alapber = document.getElementById("Alapber").value;
    let Email = document.getElementById("Email").value;
    let Telefonszam = document.getElementById("Telefonszam").value;
    let Munkakor = document.getElementById("Munkakor").value; /* Az összes adattipus lekezelése. */

    let khossz = Keresztnev.split(' ');
    let vhossz = Vezeteknev.split(' ');

    if (Keresztnev !== "" && Vezeteknev !== "" && Szuletesi_datum !== "" && Anyja_neve !== "" && Tajszam !== "" && Adoszam !== "" &&
        Bankszamlaszam !== "" && Alapber !== "" && Email !== "" && /* Vizsgáljuk hogy üresek e a változók. */
        Telefonszam !== "" && Munkakor !== "" && Tajszam.length === 9 && Adoszam.length === 10 && Bankszamlaszam.length >= 16 && Bankszamlaszam.length <= 24 
    && !hibas_bank.includes(Bankszamlaszam.length) && khossz.length == 1 && jo_hossz.includes(vhossz.length)) {

        let lista = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", 
                    "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", 
                    "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"]; // 36 karakter a qrcode-hoz.

        let random_karakterek = ""; /* Üressé állitjuk. */

        for (let i = 0; i < 8; i++) // Qrcode hossza.
        {
            let random_index = Math.floor(Math.random() * 36);
            let karakter = lista[random_index];
            random_karakterek += karakter;
        } // Kiválasztunk egy random karaktert, majd hozzáadjuk egy változóhoz és hozzáfüzzük egy másikhoz ami maga a qrcode.

        let qrcode_mezo = document.getElementById("qrcode_mezo");
        qrcode_mezo.value = random_karakterek; // Hozzáadjuk a generált qrcode-ot.

        let qrcode_nyilvantartas = document.getElementById("qrcode_nyilvantartas"); // Nyilvántartás rész megcélozása.
        qrcode_nyilvantartas.innerHTML = ""; // Törlés.
        new QRCode(qrcode_nyilvantartas, { // Majd az új Qrcode hozzáadása.
            text: random_karakterek,
            width: 200,
            height: 200
        });

        felvitel_gomb = document.getElementById("felvitel_gomb");

        felvitel_gomb.disabled = false;
    }
    else
    {

        felvitel_gomb = document.getElementById("felvitel_gomb");
        felvitel_gomb.disabled = true;

        qrcode_nyilvantartas = document.getElementById("qrcode_nyilvantartas");
        qrcode_nyilvantartas.innerHTML = "";
    }
}

function telefonszam()
{

    let Telefonszam = document.getElementById("Telefonszam");
    
    if (Telefonszam.value.length == 11 && Telefonszam.value.includes('06'))
    {

        if (isNaN(Telefonszam.value))
        {

            alert("Csak számok!");

            Telefonszam.value = "";

            felvitel_gomb = document.getElementById("felvitel_gomb");
            felvitel_gomb.disabled = true;

            qrcode_nyilvantartas = document.getElementById("qrcode_nyilvantartas");
            qrcode_nyilvantartas.innerHTML = "";

        }

    }
    else if (Telefonszam.value.length == 12)
    {

        if (!Telefonszam.value.includes('+36'))
        {

            alert("Hibás formátum!");

            Telefonszam.value = "";

            felvitel_gomb = document.getElementById("felvitel_gomb");
            felvitel_gomb.disabled = true;

            qrcode_nyilvantartas = document.getElementById("qrcode_nyilvantartas");
            qrcode_nyilvantartas.innerHTML = "";

        }
        else if (isNaN(Telefonszam.value))
        {

            alert("Csak számok!");

            Telefonszam.value = "";

            felvitel_gomb = document.getElementById("felvitel_gomb");
            felvitel_gomb.disabled = true;

            qrcode_nyilvantartas = document.getElementById("qrcode_nyilvantartas");
            qrcode_nyilvantartas.innerHTML = "";

        }

    }
    else
    {

        alert("Hiányos!");

        Telefonszam.value = "";

        felvitel_gomb = document.getElementById("felvitel_gomb");
        felvitel_gomb.disabled = true;

        qrcode_nyilvantartas = document.getElementById("qrcode_nyilvantartas");
        qrcode_nyilvantartas.innerHTML = "";

    }

}

function ervenyes_nev()
{

    let Anyja_neve = document.getElementById("Anyja_neve");

    let a_nev = Anyja_neve.value.trim();

    let hossz = a_nev.split(' ');

    if (hossz.length != 2 && hossz.length != 3)
    {

        alert("Érvénytelen név!");

        Anyja_neve.value = "";

        felvitel_gomb = document.getElementById("felvitel_gomb");
        felvitel_gomb.disabled = true;

        qrcode_nyilvantartas = document.getElementById("qrcode_nyilvantartas");
        qrcode_nyilvantartas.innerHTML = "";

    }

}

function email_e()
{

    let email = document.getElementById("Email");

    if (!email.value.includes('@'))
    {

        alert("Hiányos!");

        email.value = "";

        felvitel_gomb = document.getElementById("felvitel_gomb");
        felvitel_gomb.disabled = true;

        qrcode_nyilvantartas = document.getElementById("qrcode_nyilvantartas");
        qrcode_nyilvantartas.innerHTML = "";

    }

}

function modal_qrcode() 
{
    let qrcode_modal = document.getElementById("modal_qrcode").value;
    let qrcode_id = document.getElementById("qrcode_id");
    qrcode_id.innerHTML = "";
    new QRCode(qrcode_id, {
        text: qrcode_modal,
        width: 200,
        height: 200
    });
}

function qrcode_bezar()
{

    let qrcode_id = document.getElementById("qrcode_id");
    qrcode_id.innerHTML = "";

}

function megnez()
{

    let Alapber = document.getElementById("Alapber");
    let Tajszam = document.getElementById("Tajszam");
    let Adoszam = document.getElementById("Adoszam");
    let Bank = document.getElementById("Bankszamlaszam");
    let modal_alapber = document.getElementById("modal_alapber");

    if (isNaN(Alapber.value))
    {

        alert("Csak számok!");

        Alapber.value = "";     

        felvitel_gomb = document.getElementById("felvitel_gomb");
        felvitel_gomb.disabled = true;

        qrcode_nyilvantartas = document.getElementById("qrcode_nyilvantartas");
        qrcode_nyilvantartas.innerHTML = "";
        
    }
    else if (isNaN(Tajszam.value))
    {

        alert("Csak számok!");

        Tajszam.value = "";

        felvitel_gomb = document.getElementById("felvitel_gomb");
        felvitel_gomb.disabled = true;

        qrcode_nyilvantartas = document.getElementById("qrcode_nyilvantartas");
        qrcode_nyilvantartas.innerHTML = "";

    }
    else if (isNaN(Adoszam.value))
    {

        alert("Csak számok!");

        Adoszam.value = "";

        felvitel_gomb = document.getElementById("felvitel_gomb");
        felvitel_gomb.disabled = true;

        qrcode_nyilvantartas = document.getElementById("qrcode_nyilvantartas");
        qrcode_nyilvantartas.innerHTML = "";

    }
    else if (isNaN(Bank.value))
    {

        alert("Csak számok!");

        Bank.value = "";

        felvitel_gomb = document.getElementById("felvitel_gomb");
        felvitel_gomb.disabled = true;

        qrcode_nyilvantartas = document.getElementById("qrcode_nyilvantartas");
        qrcode_nyilvantartas.innerHTML = "";

    }
    else if (isNaN(modal_alapber.value))
    {

        alert("Csak számok!");

        modal_alapber.value = "";

        felvitel_gomb = document.getElementById("felvitel_gomb");
        felvitel_gomb.disabled = true;

        qrcode_nyilvantartas = document.getElementById("qrcode_nyilvantartas");
        qrcode_nyilvantartas.innerHTML = "";

    }

}

function datum() 
{
    let ma = new Date();

    let Szuletesi_datum = document.getElementById("Szuletesi_datum");
    let szuletes_input = Szuletesi_datum.value;

    if (!szuletes_input) 
    {
        alert("Kérlek, adj meg egy dátumot!");
        return;
    }

    let uj_datum = new Date(szuletes_input);

    if (uj_datum > ma) 
    {
        alert("Az érték nem lehet a jövőben!");
        Szuletesi_datum.value = "";

        felvitel_gomb = document.getElementById("felvitel_gomb");
        felvitel_gomb.disabled = true;

        qrcode_nyilvantartas = document.getElementById("qrcode_nyilvantartas");
        qrcode_nyilvantartas.innerHTML = "";
    }

}

function torles(id) 
{
    if (!id) return; // Ha nincs id akkor nem csinálunk semmit.

    fetch('/dolgozok/' + id, // Kikérjük a dolgozókból az ID-t.
    {
        method: 'DELETE', // Törlés beállitása.
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // Token ellenörzése (biztonsági okokból).
            'Content-Type': 'application/json', // JSON-á állitás.
        }
    })
    .then(function(valasz) 
    {

        return valasz.json(); // Válasz JSON-á konvertálása.
    })
    .then(function(adat) 
    {

        if (adat.success) // Ha van dolgozó akkor kitöröljük a DOM-ból is majd visszamegyünk a nyilvántartásra.
        {
            console.log("Dolgozó törölve:", id);
            let elem = document.getElementById("sor_" + id);
            if (elem) 
            {
                elem.remove();
            } 
            else 
            {
                console.error("Nem található a törlendő elem:", "sor_" + id);
            }

            setTimeout(function() 
            {
                window.location.href = '/registry';
            }, 500);
        } 
        else 
        {
            alert(data.message);
        }

    })
    .catch(function(hiba) 
    {
        console.error("Hiba történt a törlés során:", hiba);
    });

}

function lekeres(id) // ID szerint megjelenitjük a dolgozók adatait.
{
    fetch('/dolgozok/' + id)
        .then(function(valasz) 
        {
            return valasz.json();
        })
        .then(function(adat) 
        {
            console.log('Lekért adatok:', adat);
            if (adat.success) 
            {
                document.getElementById("modal_id").value = id;
                document.getElementById("modal_vezeteknev").value = adat.dolgozo.Vezeteknev;
                document.getElementById("modal_keresztnev").value = adat.dolgozo.Keresztnev;
                document.getElementById("modal_email").value = adat.dolgozo.Email;
                document.getElementById("modal_telefonszam").value = adat.dolgozo.Telefonszam;
                document.getElementById("modal_munkakor").value = adat.dolgozo.Munkakor;
                document.getElementById("modal_alapber").value = adat.dolgozo.Alapber;
                document.getElementById("modal_szuletesi").value = adat.dolgozo.Szuletesi_datum;
                document.getElementById("modal_anyja").value = adat.dolgozo.Anyja_neve;
                document.getElementById("modal_tajszam").value = adat.dolgozo.Tajszam;
                document.getElementById("modal_adoszam").value = adat.dolgozo.Adoszam;
                document.getElementById("modal_bankszamlaszam").value = adat.dolgozo.Bankszamlaszam;
                document.getElementById("modal_qrcode").value = adat.dolgozo.Qrcode;

                let modal = document.getElementById("modal");
                modal.classList.remove("hidden");
                modal.style.display = "flex";
            } 
            else 
            {
                alert("Hiba történt az adatok lekérése közben.");
            }
        })
        .catch(function(hiba) 
        {
            console.error('Hiba:', hiba);
            alert("Hiba történt az adatok lekérése közben.");
        });
}

function mentes() // Rámentük a dolgozó összes adatára ha valamit el akarunk menteni.
{
    let id = document.getElementById("modal_id").value;
    let vezeteknev = document.getElementById("modal_vezeteknev").value;
    let keresztnev = document.getElementById("modal_keresztnev").value;
    let email = document.getElementById("modal_email").value;
    let telefonszam = document.getElementById("modal_telefonszam").value;
    let munkakor = document.getElementById("modal_munkakor").value;
    let alapber = document.getElementById("modal_alapber").value;
    let szuletesi_datum = document.getElementById("modal_szuletesi").value;
    let anyja_neve = document.getElementById("modal_anyja").value;
    let tajszam = document.getElementById("modal_tajszam").value;
    let adoszam = document.getElementById("modal_adoszam").value;
    let bankszamlaszam = document.getElementById("modal_bankszamlaszam").value;
    let qrcode = document.getElementById("modal_qrcode").value;

    let mkhossz = keresztnev.split(' ');
    let mvhossz = vezeteknev.split(' ');

    if (vezeteknev != "" && keresztnev != "" && email.includes('@') && email != "" && telefonszam != "" 
    && !isNaN(telefonszam) && munkakor != "" && alapber != "" && !isNaN(alapber) && szuletesi_datum != "" && 
    anyja_neve != "" && tajszam != "" && !isNaN(tajszam) && adoszam != "" && !isNaN(adoszam) && bankszamlaszam != "" && !isNaN(bankszamlaszam)
    && tajszam.length === 9 && adoszam.length === 10 && bankszamlaszam.length >= 16 && bankszamlaszam.length <= 24 
    && !hibas_bank.includes(bankszamlaszam.length) && mkhossz.length == 1 && jo_hossz.includes(mvhossz.length))
    {    
        fetch('/dolgozok/update', 
        
        {
            method: "POST",
            headers: 
            {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id: id,
                vezeteknev: vezeteknev,
                keresztnev: keresztnev,
                email: email,
                telefonszam: telefonszam,
                munkakor: munkakor,
                alapber: alapber,
                szuletesi_datum: szuletesi_datum,
                anyja_neve: anyja_neve,
                tajszam: tajszam,
                adoszam: adoszam,
                bankszamlaszam: bankszamlaszam,
                qrcode: qrcode
            })
        })
        .then(function(valasz) 
        {
            return valasz.json();
        })
        .then(function(adat) 
        {
            if (adat.success) 
            {
                alert("Adatok sikeresen frissítve!");
                document.getElementById("modal").classList.add("hidden");
                window.location.href = '/registry';
            } 
            else 
            {
                alert("Hiba történt: " + adat.error);
            }
        })
        .catch(function(hiba) 
        {
            console.error("Hiba:", hiba);
        });
    }
    else
    {

        alert("Hiányos adatok!");

    }
}

function bezaras() 
{
    document.getElementById("modal").classList.add("hidden");
}

function oldal_frissites()
{

    window.location.href = '/registry';

}