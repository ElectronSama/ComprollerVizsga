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

$neve = $_POST['exampleDataList'];
$dkezd = $_POST['dkezd'];
$dveg = isset($_POST['dveg']) ? $_POST['dveg'] : "";

$adatok = [];

$nev_reszek = explode(" ", $neve);
$vezeteknev = $nev_reszek[0];
$keresztnev = isset($nev_reszek[1]) ? $nev_reszek[1] : "";

if ($dveg != "") 
{
    $sql = "SELECT Vezeteknev, Keresztnev, Datum_Be, Datum_Ki FROM csekkolasok 
            WHERE (Vezeteknev LIKE '%$vezeteknev%' OR Keresztnev LIKE '%$keresztnev%')
            AND Datum_Be >= '$dkezd' 
            AND Datum_Ki <= '$dveg'
            ORDER BY Datum_Be ASC";
} 
else 
{
    $sql = "SELECT Vezeteknev, Keresztnev, Datum_Be, Datum_Ki FROM csekkolasok 
            WHERE (Vezeteknev LIKE '%$vezeteknev%' OR Keresztnev LIKE '%$keresztnev%')
            AND Datum_Be >= '$dkezd'
            ORDER BY Datum_Be ASC";
}

$eredmeny = $kapcsolat->query($sql);

if ($eredmeny === false) 
{
    die("Hiba a lekérdezés végrehajtásában: " . $kapcsolat->error);
}

if ($eredmeny->num_rows > 0) 
{
    $osszes_ora = 0;
    $csekkolasok_szama = 0;

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
            $be_ido = strtotime($bejelentkezesek[$i]['Datum_Be']);
            $ki_ido = strtotime($kijelentkezesek[$i]['Datum_Ki']);
            $munka_ora = ($ki_ido - $be_ido) / 3600;
            $osszes_ora += $munka_ora;

            $adatok[] = [
                'teljes_nev' => $bejelentkezesek[$i]['teljes_nev'],
                'Datum_Be' => $bejelentkezesek[$i]['Datum_Be'],
                'Datum_Ki' => $kijelentkezesek[$i]['Datum_Ki']
            ];
        }
    }

    $csekkolasok_szama = count($bejelentkezesek);

    echo "Összes munkaóra: " . $osszes_ora . " óra<br>";
    echo "Csekkolások száma: " . $csekkolasok_szama . "<br>";
} 
else 
{
    echo "Nincs találat.";
}

if (!empty($adatok)) 
{
    foreach ($adatok as $sor) 
    {
        $uj_nev = $sor['teljes_nev'];
        $datum_be = $sor["Datum_Be"];
        $datum_ki = $sor["Datum_Ki"];

        $sql = "INSERT INTO ideiglenes (Nev, Datum_Be, Datum_Ki) VALUES ('$uj_nev', '$datum_be', '$datum_ki')";
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