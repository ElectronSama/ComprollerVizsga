function datum() 
{
    let ma = new Date();
    ma.setHours(0, 0, 0, 0);

    let Szuletesi_datum = document.getElementById("date2");
    let szuletes_input = Szuletesi_datum.value;

    if (!szuletes_input) 
    {
        alert("Kérlek, adj meg egy dátumot!");
        return;
    }

    let uj_datum = new Date(szuletes_input);
    uj_datum.setHours(0, 0, 0, 0);

    if (uj_datum > ma) 
    {
        alert("Az érték nem lehet a jövőben!");
        Szuletesi_datum.value = "";
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

document.addEventListener("DOMContentLoaded", function() {
    let ma = new Date();
    let formatalt = ma.toISOString().split("T")[0];
    document.getElementById("date").setAttribute("max", formatalt);

    let resz1 = document.getElementById("break-group-1");
    let resz2 = document.getElementById("break-group-2");
    let ido1 = document.getElementById("break-time-1");
    let ido2 = document.getElementById("break-time-2");
    let veg1 = document.getElementById("break-end-1");
    let veg2 = document.getElementById("break-end-2");
    let resz3 = document.getElementById("no-break-div");

    resz1.classList.add("d-none");
    resz2.classList.add("d-none");
    ido1.disabled = true;
    ido2.disabled = true;
    veg1.disabled = true;
    veg2.disabled = true;
});

document.getElementById("hours").addEventListener("change", function() {
    let orak = this.value;
    let resz1 = document.getElementById("break-group-1");
    let resz2 = document.getElementById("break-group-2");
    let ido1 = document.getElementById("break-time-1");
    let ido2 = document.getElementById("break-time-2");
    let veg1 = document.getElementById("break-end-1");
    let veg2 = document.getElementById("break-end-2");
    let resz3 = document.getElementById("no-break-div");

    resz1.classList.add("d-none");
    resz2.classList.add("d-none");
    ido1.disabled = true;
    ido2.disabled = true;
    veg1.disabled = true;
    veg2.disabled = true;
    resz3.classList.remove("d-none");

    if (orak == "4") {
    } else if (orak == "8") {
        resz1.classList.remove("d-none");
        ido1.disabled = false;
        veg1.disabled = false;
        resz3.classList.add("d-none");
    } else if (orak == "12") {
        resz1.classList.remove("d-none");
        resz2.classList.remove("d-none");
        ido1.disabled = false;
        ido2.disabled = false;
        veg1.disabled = false;
        veg2.disabled = false;
        resz3.classList.add("d-none");
    }
});

document.getElementById("break-time-1").addEventListener("change", function() {
    if (this.value) {
        let javasolt_veg = szamol_szunetvege(this.value);
        document.getElementById("break-end-1").value = javasolt_veg;
    }
});

document.getElementById("break-time-2").addEventListener("change", function() {
    if (this.value) {
        let javasolt_veg = szamol_szunetvege(this.value);
        document.getElementById("break-end-2").value = javasolt_veg;
    }
});

function szamolas_munkavege(munka_kezdete, munka_orak) {
    let kezdes_datum = new Date("1970-01-01T" + munka_kezdete + ":00");
    kezdes_datum.setHours(kezdes_datum.getHours() + parseInt(munka_orak));
    return kezdes_datum.toTimeString().split(" ")[0].substring(0, 5);
}

function szamol_szunetvege(szunet_kezdete) {
    if (!szunet_kezdete) return '-';
    let kezdet_datum = new Date("1970-01-01T" + szunet_kezdete + ":00");
    kezdet_datum.setMinutes(kezdet_datum.getMinutes() + 30);
    return kezdet_datum.toTimeString().split(" ")[0].substring(0, 5);
}

function szunet_ellenorzes(munka_kezdete, szunet_kezdete, szunet_vege) {
    if (!szunet_kezdete || !szunet_vege) return true;

    let munkakezdet_datum = new Date("1970-01-01T" + munka_kezdete + ":00");
    let szunetkezdet_datum = new Date("1970-01-01T" + szunet_kezdete + ":00");
    let szunetveg_datum = new Date("1970-01-01T" + szunet_vege + ":00");
    
    if (szunetkezdet_datum < munkakezdet_datum) {
        return false;
    }
    
    if (szunetveg_datum <= szunetkezdet_datum) {
        return false;
    }
    
    return true;
}

let oraber = 2000;

document.getElementById("add-button").addEventListener("click", function() {
    let dolgozo = document.getElementById("name").value;
    let munkanap = document.getElementById("date").value;
    let vegnap = document.getElementById("date2").value;
    let munka_kezdete = document.getElementById("time").value;
    let munka_orak = document.getElementById("hours").value;
    let elso_szunet = document.getElementById("break-time-1").value;
    let elso_szunet_vege = document.getElementById("break-end-1").value;
    let masodik_szunet = document.getElementById("break-time-2").value;
    let masodik_szunet_vege = document.getElementById("break-end-2").value;
    let hiba_uzenet = document.getElementById("error-message");

    hiba_uzenet.textContent = "";
    hiba_uzenet.classList.add("d-none");

    if (!munkanap && !vegnap) {
        hiba_uzenet.textContent = "Hiba: A dátumok megadása kötelező!";
        hiba_uzenet.classList.remove("d-none");
        return;
    }

    let datum = new Date(munkanap);
    let ev = datum.getFullYear();
    let datum2 = new Date(vegnap);
    let ev2 = datum2.getFullYear();
    if ((ev !== 2025) || (ev2 !== 2025)) {
        hiba_uzenet.textContent = "Hiba: Csak 2025-ös dátumok adhatók meg!";
        hiba_uzenet.classList.remove("d-none");
        document.getElementById("date").value = "";
        return;
    }
    
    if (elso_szunet && !szunet_ellenorzes(munka_kezdete, elso_szunet, elso_szunet_vege)) {
        hiba_uzenet.textContent = "Hiba: Az első szünet időpontjai érvénytelenek! Ellenőrizd, hogy a szünet kezdete a munka kezdete után van-e, és a szünet vége a szünet kezdete után következik-e.";
        hiba_uzenet.classList.remove("d-none");
        return;
    }

    if (masodik_szunet && !szunet_ellenorzes(munka_kezdete, masodik_szunet, masodik_szunet_vege)) {
        hiba_uzenet.textContent = "Hiba: A második szünet időpontjai érvénytelenek! Ellenőrizd, hogy a szünet kezdete a munka kezdete után van-e, és a szünet vége a szünet kezdete után következik-e.";
        hiba_uzenet.classList.remove("d-none");
        return;
    }

    let teljes_oraber = munka_orak * oraber;
    let munka_befejezese = document.getElementById("time2").value;

    if (dolgozo && munkanap && vegnap && munka_kezdete && munka_orak && munka_befejezese) {

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

        /*

            Nem használt elemek.

                <td>${elso_szunet || '-'}</td>
                <td>${elso_szunet_vege || '-'}</td>
                <td>${masodik_szunet || '-'}</td>
                <td>${masodik_szunet_vege || '-'}</td>
                <td>${munka_orak} óra</td>
                <td>${teljes_oraber.toLocaleString()} Ft</td>

        */

        setTimeout(function() {
            let mezok = ["name", "date", "date2", "time", "time2"];
            mezok.forEach(function(i) {
                document.getElementById(i).value = "";
            });

            let szunet1_kezdet = document.getElementById("break-time-1");
            let szunet1_veg = document.getElementById("break-end-1");
            let szunet2_kezdet = document.getElementById("break-time-2");
            let szunet2_veg = document.getElementById("break-end-2");
            szunet1_kezdet.disabled = true;
            szunet1_veg.disabled = true;
            szunet2_kezdet.disabled = true;
            szunet2_veg.disabled = true;
            
            let breakGroup1 = document.getElementById("break-group-1");
            let breakGroup2 = document.getElementById("break-group-2");
            breakGroup1.classList.add("d-none");
            breakGroup2.classList.add("d-none");
            
            let noBreakDiv = document.getElementById("no-break-div");
            noBreakDiv.classList.remove("d-none");
            
            oraber = 2000;
        }, 1000);
    } else {
        hiba_uzenet.textContent = "Hiba: Kérjük, töltsd ki az összes kötelező mezőt!";
        hiba_uzenet.classList.remove("d-none");
    }
});

document.getElementById("name").addEventListener("change", function() {
    let nev = this.value.trim();
    if (nev) {
        alapber(nev);
    }
});

function alapber(nev) 
{
    let nev_reszek = nev.split(" "); /* Nevek felosztása. (Vezeték,kereszt). */
    
    if (nev_reszek.length < 2) /* Ha a hossza kisebb mint 2... */
    {
        alert("Kérlek, adj meg egy érvényes nevet!"); /* Megszakitjuk a kódot. */
        return;
    }

    let vezeteknev = nev_reszek[0];
    let keresztnev = nev_reszek.slice(1).join(" "); /* // Az első szó lesz a vezetéknév, a többi rész összefűzve a keresztnév. */

    let idopont_input = document.getElementById("date").value;
    let idopont_input2 = document.getElementById("date2").value;
    let idopont_ido = document.getElementById("time").value;
    let idopont_ido2 = document.getElementById("time2").value;
    let leiras_input = document.getElementById("hours").value;
    let muszak_input = document.getElementById("name").value; /* Kiszedjük a bemeneti adatokat. */

    let formData = new URLSearchParams(); /* Form kompatibilissá állitsuk a változót. */
    formData.append("action", "lekeres"); /* Hozzáfüzünk egy parancsszót. */
    formData.append("vezeteknev", vezeteknev);
    formData.append("keresztnev", keresztnev);
    formData.append("idopont_input", idopont_input);
    formData.append("idopont_input2", idopont_input2);
    formData.append("idopont_ido", idopont_ido);
    formData.append("idopont_ido2", idopont_ido2);
    formData.append("leiras_input", leiras_input);
    formData.append("muszak_input", muszak_input); /* Hozzáfüzzük a küldendő adatokat. */

    fetch("php/mfeltoltes.php", /* Megcélozzuk a php-t. */ 
    {
        method: "POST", /* Küldés módja. */
        headers: { "Content-Type": "application/x-www-form-urlencoded" }, /* Formája. */
        body: formData /* Mit küldünk. */
    })
    .then(function(response) 
    {
        return response.json(); /* JSON-á konvertálás. (response=válasz)*/
    })
    .then(function(data) 
    {
        if (data.alapber) 
        {
            oraber = data.alapber;
            alert("Siker! Alapbér: " + data.alapber + " Ft"); /* Ha találtunk alapbért, megjelenitsük. */
        } 
        else if (data.alapber_error) 
        {
            alert("Hiba: " + data.alapber_error); /* Vagy ha nem azt is. */
        }

        /* Válasz a kimenetről. */
        if (data.insert_success) 
        {
            console.log("Adatbázisba elmentve.");
        } 
        else if (data.insert_error) 
            {
            alert("Hiba az esemény hozzáadása során: " + data.insert_error);
        }
    })
    .catch(function(error) /* Hibaüzenet. */
    {
        console.error("Hiba:", error);
    });
}