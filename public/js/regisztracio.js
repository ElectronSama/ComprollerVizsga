let megjelenitett = false;
let megjelenitett2 = false;

function megvaltoztat()
{

    let szem_kep = document.getElementById("szem_kep");
    let jelszo = document.getElementById("jelszo");

    if (megjelenitett === false)
    {

        
        szem_kep.src = "kepek/szem_ki.png";
        jelszo.type = "input";
        megjelenitett = true;

    }
    else if (megjelenitett === true)
    {

        szem_kep.src = "kepek/szem_be.png";
        jelszo.type = "password";
        megjelenitett = false;

    }

}

function megvaltoztat2()
{

    let szem_kep = document.getElementById("szem_kep2");
    let jelszo_megerosites = document.getElementById("jelszo_megerosites");

    if (megjelenitett === false)
    {

        
        szem_kep.src = "kepek/szem_ki.png";
        jelszo_megerosites.type = "input";
        megjelenitett = true;

    }
    else if (megjelenitett === true)
    {

        szem_kep.src = "kepek/szem_be.png";
        jelszo_megerosites.type = "password";
        megjelenitett = false;

    }

}

function kitoltve()
{

    let fnev = document.getElementById("felhasznalonev");
    let jogkor = document.getElementById("szerep");
    let jelszo_mezo = document.getElementById("jelszo");
    let jelszo_mezo2 = document.getElementById("jelszo_megerosites");
    let regisztracio = document.getElementById("regisztracio_gomb");

    if (fnev.value !== "" && jogkor.value !== "" && jelszo_mezo.value !== "" && jelszo_mezo2.value !== "")
    {

        if (jelszo_mezo.value === jelszo_mezo2.value)
        {
            regisztracio.disabled = false;
        }
        else
        {

            alert("Nem egyeznek a jelszavak!");

            regisztracio.disabled = true;

        }

    }
    else if (fnev.value === "" || jogkor.value === "" || jelszo_mezo.value === "" || jelszo_mezo2.value === "")
    {

        regisztracio.disabled = true;

    }

}
