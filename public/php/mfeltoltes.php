<?php

    header("Content-Type: application/json"); // JSON tipus beállitása.

    $servernev = "localhost";
    $felhasznalo = "root";
    $jelszo = "";
    $adatbazis = "comproller";

    $kapcsolat = new mysqli($servernev, $felhasznalo, $jelszo, $adatbazis);

    if ($kapcsolat->connect_error) 
    {
        echo json_encode(["success" => false, "error" => "Kapcsolódási hiba"]);
        exit();
    }

    $valasz = [];

    $vezeteknev = $_POST['vezeteknev']; // Üres részek levágása.
    $keresztnev = $_POST['keresztnev'];

    $sql = "SELECT Alapber FROM nyilvantartas WHERE Vezeteknev = ? AND Keresztnev = ?";
    $stmt = $kapcsolat->prepare($sql);
    $stmt->bind_param("ss", $vezeteknev, $keresztnev);
    $stmt->execute();
    $eredmeny = $stmt->get_result(); // Adatok kikeresése...

    if ($sor = $eredmeny->fetch_assoc()) 
    {
        $valasz["alapber"] = $sor["Alapber"]; // Válaszok beállitása.
    } 
    else 
    {
        $valasz["alapber_error"] = "Nincs ilyen dolgozó";
        $stmt->close();
        $kapcsolat->close();
        echo json_encode($valasz);
        exit();
    }

    $stmt->close(); 

    $idopont_input = $_POST['idopont_input'];
    $idopont_input2 = $_POST['idopont_input2'];
    $idopont_ido = $_POST['idopont_ido'];
    $idopont_ido2 = $_POST['idopont_ido2'];
    $leiras_input = $_POST['leiras_input'];
    $muszak_input = $_POST['muszak_input'];

    if ($idopont_ido === "") 
    {
        $idopont_ido = "00:00";
    }

    $idopont = $idopont_input . " ";
    $idopont2 = $idopont_input2 . " ";

    $ora1 = $idopont_ido;
    $ora2 = $idopont_ido2;

    $nevek = explode(" ", $muszak_input, 2); // Részválasztás.

    $vezeteknev = $nevek[0];
    $keresztnev = $nevek[1];

    $sql = "INSERT INTO csekkolasok (Vezeteknev, Keresztnev, Datum_Be, Datum_Ki, Kezdido, Vegido) VALUES (?, ?, ?, ?, ?, ?)"; // Adatok feltöltése csekkolásba.
    $stmt = $kapcsolat->prepare($sql);
    $stmt->bind_param("ssssss", $vezeteknev, $keresztnev, $idopont, $idopont2, $ora1, $ora2);

    if ($stmt->execute()) // Válasz visszadása.
    {
        $valasz["insert_success"] = true;
    } 
    else 
    {
        $valasz["insert_error"] = "Hiba az esemény hozzáadása során";
    }
    
    $stmt->close();

    echo json_encode($valasz); // JSON-á konvertálás...

    $kapcsolat->close();

?>