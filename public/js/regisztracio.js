function megnez(jelszo_id, ikon_elem) // Jelszó elrejtése vagy megjelenitése.
{
    let jelszo_mezo = document.getElementById(jelszo_id);
    if (jelszo_mezo.type === 'password') 
    {
        jelszo_mezo.type = 'text';
        ikon_elem.src = 'kepek/szem_ki.png';
    } 
    else 
    {
        jelszo_mezo.type = 'password';
        ikon_elem.src = 'kepek/szem_be.png';
    }
}

function uzenet_megjelenites(uzenet_id, uzenet, sikeres) // Üzenet tipushoz CSS rendelése.
{
    let uzenet_elem = document.getElementById(uzenet_id);
    uzenet_elem.textContent = uzenet;
    uzenet_elem.classList.remove('success_message', 'error_message');
    uzenet_elem.classList.add(sikeres ? 'success_message' : 'error_message');
    uzenet_elem.style.display = 'block';
    
    setTimeout(function() 
    {
        uzenet_elem.style.display = 'none';
    }, 3000); // 3 másodperc után eltünik.
}

function regisztracio() // Mezők ellenörzése.
{
    let felhasznalo_nev = document.getElementById('felhasznalo_nev');
    let email = document.getElementById('email');
    let jelszo = document.getElementById('jelszo');
    let jelszo_megerosites = document.getElementById('jelszo_megerosites');
    
    if (felhasznalo_nev.value.trim() === '') 
    {
        uzenet_megjelenites('uzenet', 'Kérem adjon meg egy felhasználónevet!', false);
        return;
    }
    
    if (email.value.trim() === '') 
    {
        uzenet_megjelenites('uzenet', 'Kérem adja meg az e-mail címét!', false);
        return;
    }
    
    if (jelszo.value.trim() === '') 
    {
        uzenet_megjelenites('uzenet', 'Kérem adjon meg egy jelszót!', false);
        return;
    }
    
    if (jelszo_megerosites.value.trim() === '') 
    {
        uzenet_megjelenites('uzenet', 'Kérem erősítse meg a jelszavát!', false);
        return;
    }
    
    if (jelszo.value !== jelszo_megerosites.value) 
    {
        uzenet_megjelenites('uzenet', 'A két jelszó nem egyezik!', false);
        return;
    }
    
    uzenet_megjelenites('uzenet', 'Sikeres regisztráció!', true);
    
}