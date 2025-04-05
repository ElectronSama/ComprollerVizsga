<?php
$servernev = "localhost";
$felhasznalo = "root";
$jelszo = "";
$adatbazis = "comproller";

$kapcsolat = new mysqli($servernev, $felhasznalo, $jelszo, $adatbazis);

if ($kapcsolat->connect_error) 
{
    die("Kapcsolódási hiba: " . $kapcsolat->connect_error);
}

$adott_id = $_POST['exampleDataList'];
$dkezd = $_POST['dkezd']; // Mezők lekérése.
if (isset($_POST['dveg'])) // Vizsgálat hogy van e végidő.
{  
    $dveg = $_POST['dveg'];
} 
else 
{
    $dveg = "";
}

$adatok = [];

if ($dveg != "") // MYSQL lekérés igazítása időpontokhoz.
{
    $sql = "SELECT az_id, Vezeteknev, Keresztnev, Datum_Be, Datum_Ki FROM csekkolasok 
            WHERE az_id = '$adott_id'
            AND Datum_Be >= '$dkezd' 
            AND Datum_Ki <= '$dveg'
            ORDER BY Datum_Be ASC";
} 
else 
{
    $sql = "SELECT az_id, Vezeteknev, Keresztnev, Datum_Be, Datum_Ki FROM csekkolasok 
            WHERE az_id = '$adott_id'
            AND Datum_Be >= '$dkezd'
            ORDER BY Datum_Be ASC";
}

$eredmeny = $kapcsolat->query($sql);

if ($eredmeny === false) 
{
    die("Hiba a lekérdezés végrehajtásában: " . $kapcsolat->error);
}

if ($eredmeny->num_rows > 0) // Lekérdezés megformázása.
{

    $bejelentkezesek = [];
    $kijelentkezesek = [];

    while ($sor = $eredmeny->fetch_assoc()) 
    {
        $teljes_nev = $sor['Vezeteknev'] . " " . $sor['Keresztnev'];

        if ($sor["Datum_Be"] != "") 
        {
            $bejelentkezesek[] = [
                'teljes_nev' => $teljes_nev,
                'Datum_Be' => $sor["Datum_Be"]
            ];
        }
        if ($sor["Datum_Ki"] != "") 
        {
            $kijelentkezesek[] = [
                'teljes_nev' => $teljes_nev,
                'Datum_Ki' => $sor["Datum_Ki"]
            ];
        }
    }

    for ($i = 0; $i < count($bejelentkezesek); $i++) 
    {
        if (isset($kijelentkezesek[$i])) 
        {
            $adatok[] = [
                'teljes_nev' => $bejelentkezesek[$i]['teljes_nev'],
                'Datum_Be' => $bejelentkezesek[$i]['Datum_Be'],
                'Datum_Ki' => $kijelentkezesek[$i]['Datum_Ki']
            ];
        }
    }
} 
else 
{
    echo "Nincs találat.";
}

if (!empty($adatok)) // Ha van adat...
{
    foreach ($adatok as $sor) 
    {
        $uj_nev = $sor['teljes_nev'];
        $datum_be = $sor["Datum_Be"];
        $datum_ki = $sor["Datum_Ki"];

        $sql = "INSERT INTO ideiglenes (Nev, Datum_Be, Datum_Ki) VALUES ('$uj_nev', '$datum_be', '$datum_ki')"; // Az ideiglenes adatbázisba eltároluk.
        if ($kapcsolat->query($sql) === false) 
        {
            die("Hiba az adat beszúrásakor: " . $kapcsolat->error);
        }
    }
}

$kapcsolat->close();
?>

<script>

    window.close();

</script>