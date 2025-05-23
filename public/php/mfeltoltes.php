<?php

    header("Content-Type: application/json");

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

    $kid = $_POST['kivalasztott_id'];
    $az_id;
    $vezeteknev;
    $keresztnev;

    $sql = "SELECT DolgozoID, Vezeteknev, Keresztnev FROM nyilvantartas WHERE DolgozoID = '$kid'";
    $eredmeny = $kapcsolat->query($sql);

    if ($sor = $eredmeny->fetch_assoc()) 
    {
        $az_id = $sor["DolgozoID"];
        $vezeteknev = $sor['Vezeteknev'];
        $keresztnev = $sor['Keresztnev'];
    } 
    else 
    {
        $kapcsolat->close();
        exit();
    }

    $idopont_input = $_POST['idopont_input'];
    $idopont_input2 = $_POST['idopont_input2'];
    $idopont_ido = $_POST['idopont_ido'];
    $idopont_ido2 = $_POST['idopont_ido2'];
    $leiras_input = $_POST['leiras_input'];
    $dolgozoid_mezo = $_POST['dolgozoid_mezo'];
    $ora_input = $_POST['ora_input'];
    $ber_input = $_POST['ber_input'];
    $bonusz_input = $_POST['bonusz_input'];
    $vegosszeg_input = $_POST['vegosszeg_input'];

    if ($idopont_ido === "") 
    {
        $idopont_ido = "00:00";
    }

    $idopont = $idopont_input;
    $idopont2 = $idopont_input2;

    $ora1 = $idopont_ido . ":00";
    $ora2 = $idopont_ido2 . ":00";

    $sql = "INSERT INTO csekkolasok (az_id, Vezeteknev, Keresztnev, Datum_Be, Datum_Ki, Kezdido, Vegido, Ora, Ber, Bonusz, Vegosszeg) 
            VALUES ('$az_id','$vezeteknev', '$keresztnev', '$idopont', '$idopont2', '$ora1', '$ora2', '$ora_input', '$ber_input', '$bonusz_input', '$vegosszeg_input')";

    if ($kapcsolat->query($sql)) 
    {
        $valasz["insert_success"] = true;
    }
    else 
    {
        $valasz["insert_error"] = "Hiba az esemény hozzáadása során";
    }

    echo json_encode($valasz);

    $kapcsolat->close();

?>
