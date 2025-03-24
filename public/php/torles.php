<?php

    $esemeny_neve = $_POST['esemeny_neve'];

    $szerver = "localhost";
    $felhasznalo = "root";
    $jelszo = "";
    $adatbazis = "comproller";

    $kapcsolodas = new mysqli($szerver, $felhasznalo, $jelszo, $adatbazis);

    if ($kapcsolodas->connect_error) 
    {
        die("Kapcsolódási hiba: " . $kapcsolodas->connect_error);
    }

    $sql = "DELETE FROM esemenyek WHERE esemeny_neve = '$esemeny_neve'";

    if ($kapcsolodas->query($sql) === TRUE) 
    {
        echo "Esemény sikeresen törölve: " . $_POST['esemeny_neve'];
    } 
    else 
    {
        echo "Hiba a törlés során: " . $kapcsolodas->error;
    }

    $kapcsolodas->close();

?>

<script>

    window.close();

</script>