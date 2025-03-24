<?php
$szerver = "localhost";
$felhasznalo = "root";
$jelszo = "";
$adatbazis = "comproller";

$kapcsolodas = new mysqli($szerver, $felhasznalo, $jelszo, $adatbazis);

if ($kapcsolodas->connect_error) 
{
    die("Kapcsolódási hiba: " . $kapcsolodas->connect_error);
}

// Tábla törlése, id 1-re vissza állítása.
$sql = "TRUNCATE TABLE ideiglenes;";
if ($kapcsolodas->query($sql) === false) 
{
    die("Hiba a tábla ürítésekor: " . $kapcsolodas->error);
}

$kapcsolodas->close();
?>

<script>
    window.close();
</script>