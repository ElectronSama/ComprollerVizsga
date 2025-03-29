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

    let elso_nap_indexe;
    if (honap_elso_napja.getDay() === 0) 
    {
        elso_nap_indexe = 7;  // Vasárnap az garantáltan 7-edik nap lesz a hétben
    } 
    else 
    {
        elso_nap_indexe = honap_elso_napja.getDay();
    }
    
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

function modal_megnyitasa() 
{
    document.getElementById("esemeny_modal").style.display = "block";
}

function modal_bezarasa() 
{
    document.getElementById("esemeny_modal").style.display = "none";
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
