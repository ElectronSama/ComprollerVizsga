<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comproller";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
    die("Kapcsolódási hiba: " . $conn->connect_error);
}

// Tábla törlése, id 1-re vissza állítása.
$sql = "TRUNCATE TABLE ideiglenes;";
if ($conn->query($sql) === false) 
{
    die("Hiba a tábla ürítésekor: " . $conn->error);
}

$conn->close();
?>

<script>
    window.close();
</script>