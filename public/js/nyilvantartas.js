function ures_e() 
{
    let Keresztnev = document.getElementById("Keresztnev").value.trim();
    let Vezeteknev = document.getElementById("Vezeteknev").value.trim();
    let Szuletesi_datum = document.getElementById("Szuletesi_datum").value.trim();
    let Anyja_neve = document.getElementById("Anyja_neve").value.trim();
    let Tajszam = document.getElementById("Tajszam").value.trim();
    let Adoszam = document.getElementById("Adoszam").value.trim();
    let Bankszamlaszam = document.getElementById("Bankszamlaszam").value.trim();
    let Alapber = document.getElementById("Alapber").value.trim();
    let Cim = document.getElementById("Cim").value.trim();
    let Allampolgarsag = document.getElementById("Allampolgarsag").value.trim();
    let Szemelyigazolvany_szam = document.getElementById("Szemelyigazolvany_szam").value.trim();
    let Email = document.getElementById("Email").value.trim();
    let Telefonszam = document.getElementById("Telefonszam").value.trim();
    let Munkakor = document.getElementById("Munkakor").value.trim(); /* Az összes adattipus lekezelése. */

    if (Keresztnev !== "" && Vezeteknev !== "" && Szuletesi_datum !== "" && Anyja_neve !== "" && Tajszam !== "" && Adoszam !== "" &&
        Bankszamlaszam !== "" && Alapber !== "" && Cim !== "" && Allampolgarsag !== "" && Szemelyigazolvany_szam !== "" && Email !== "" && /* Vizsgáljuk hogy üresek e a változók. */
        Telefonszam !== "" && Munkakor !== "") {

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

    if (isNaN(Alapber.value))
    {

        alert("Csak számok!");

        Alapber.value = "";
        
    }

}

function megnez_modal()
{

    let modal_alapber = document.getElementById("modal_alapber");

    if (isNaN(modal_alapber.value))
    {

        alert("Csak számok!");

        modal_alapber.value = "";
        
    }

}

function datum() 
{
    let ma = new Date();
    ma.setHours(0, 0, 0, 0);

    let Szuletesi_datum = document.getElementById("Szuletesi_datum");
    let szuletes_input = Szuletesi_datum.value;

    if (!szuletes_input) 
    {
        alert("Kérlek, adj meg egy dátumot!");
        return;
    }

    let uj_datum = new Date(szuletes_input);
    uj_datum.setHours(0, 0, 0, 0); /* Idő lefixálása hogy ne okozzon gondokat. */

    if (uj_datum > ma) 
    {
        alert("Az érték nem lehet a jövőben!");
        Szuletesi_datum.value = "";
    }

}

function hossz() 
{

    let Bankszamlaszam = document.getElementById("Bankszamlaszam");
    let hossz = Bankszamlaszam.value.length;

    if (hossz !== 12 && hossz !== 24)
    {
        alert("Túl rövid! A bankszámlaszám vagy 12 vagy 24 karakter!");
        Bankszamlaszam.value = "";
    }
    
}

let ember_adatok = document.getElementById("ember_adatok");
let ember_szamok = ember_adatok.children.length;
for (let i = 0; i < ember_szamok; i++) 
{
    let az_id = "resz" + i;
    ember_adatok.children[i].setAttribute("id", az_id);
} // ID-k állitása módosításhoz.

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
                document.getElementById("modal_cim").value = adat.dolgozo.Cim;
                document.getElementById("modal_allam").value = adat.dolgozo.Allampolgarsag;
                document.getElementById("modal_szemelyi").value = adat.dolgozo.Szemelyigazolvany_szam;
                document.getElementById("modal_tartozkodas").value = adat.dolgozo.Tartozkodasi_hely;
                document.getElementById("modal_megjegyzes").value = adat.dolgozo.Megjegyzes;

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
    let cim = document.getElementById("modal_cim").value;
    let allampolgarsag = document.getElementById("modal_allam").value;
    let szemelyi = document.getElementById("modal_szemelyi").value;
    let tartozkodas = document.getElementById("modal_tartozkodas").value;
    let megjegyzes = document.getElementById("modal_megjegyzes").value;

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
            qrcode: qrcode,
            cim: cim,
            allampolgarsag: allampolgarsag,
            szemelyi: szemelyi,
            tartozkodas: tartozkodas,
            megjegyzes: megjegyzes
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

function bezaras() 
{
    document.getElementById("modal").classList.add("hidden");
}

function oldal_frissites()
{

    window.location.href = '/registry';

}