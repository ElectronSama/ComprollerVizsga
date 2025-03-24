<?php

    $esemeny_leiras = $_POST['esemeny_leiras'];
    $datum = $_POST['datum'];

    $szerver = "localhost";
    $felhasznalo = "root";
    $jelszo = "";
    $adatbazis = "comproller";

    $kapcsolodas = new mysqli($szerver, $felhasznalo, $jelszo, $adatbazis);

    if ($kapcsolodas->connect_error) 
    {
        die("Kapcsolódási hiba: " . $kapcsolodas->connect_error);
    }

    $sql = "INSERT INTO esemenyek (esemeny_neve, datum) VALUES ('$esemeny_leiras', '$datum')";

    if ($kapcsolodas->query($sql) === TRUE) 
    {
        echo "Sikeres beszúrás!";
    } 
    else
    {
        echo "Hiba a beszúrás során: " . $kapcsolodas->error;
    }

    $kapcsolodas->close();

?>

<script>
    window.close();
</script>