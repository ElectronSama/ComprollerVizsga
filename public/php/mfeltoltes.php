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

    $vezeteknev = $_POST['vezeteknev'];
    $keresztnev = $_POST['keresztnev'];
    $az_id;

    $sql = "SELECT Alapber, DolgozoID FROM nyilvantartas WHERE Vezeteknev = '$vezeteknev' AND Keresztnev = '$keresztnev'";
    $eredmeny = $kapcsolat->query($sql);

    if ($sor = $eredmeny->fetch_assoc()) 
    {
        $valasz["alapber"] = $sor["Alapber"];
        $az_id = $sor["DolgozoID"];
    } 
    else 
    {
        $valasz["alapber_error"] = "Nincs ilyen dolgozó";
        $kapcsolat->close();
        echo json_encode($valasz);
        exit();
    }

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

    $nevek = explode(" ", $muszak_input, 2);

    $vezeteknev = $nevek[0];
    $keresztnev = $nevek[1];

    $sql = "INSERT INTO csekkolasok (az_id, Vezeteknev, Keresztnev, Datum_Be, Datum_Ki, Kezdido, Vegido) 
            VALUES ('$az_id','$vezeteknev', '$keresztnev', '$idopont', '$idopont2', '$ora1', '$ora2')";

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
