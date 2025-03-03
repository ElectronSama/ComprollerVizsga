<?php
header("Content-Type: application/json"); // JSON tipus beállitása.

if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "comproller";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) 
    {
        echo json_encode(["success" => false, "error" => "Kapcsolódási hiba"]);
        exit();
    }

    $response = [];

    if (isset($_POST['vezeteknev']) && isset($_POST['keresztnev'])) // Állitva van e...
    {
        $vezeteknev = htmlspecialchars(trim($_POST['vezeteknev'])); // Üres részek levágása.
        $keresztnev = htmlspecialchars(trim($_POST['keresztnev']));

        $sql = "SELECT Alapber FROM nyilvantartas WHERE Vezeteknev = ? AND Keresztnev = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $vezeteknev, $keresztnev);
        $stmt->execute();
        $result = $stmt->get_result(); // Adatok kikeresése...

        if ($row = $result->fetch_assoc()) 
        {
            $response["alapber"] = $row["Alapber"]; // Válaszok beállitása.
        } 
        else 
        {
            $response["alapber_error"] = "Nincs ilyen dolgozó";
            $stmt->close();
            $conn->close();
            echo json_encode($response);
            exit();
        }

        $stmt->close();
    }

    if (isset($_POST['idopont_input']) && isset($_POST['muszak_input'])) 
    {
        $idopont_input = htmlspecialchars(trim($_POST['idopont_input']));
        $idopont_input2 = htmlspecialchars(trim($_POST['idopont_input2']));
        $idopont_ido = htmlspecialchars(trim($_POST['idopont_ido']));
        $idopont_ido2 = htmlspecialchars(trim($_POST['idopont_ido2']));
        $leiras_input = htmlspecialchars(trim($_POST['leiras_input']));
        $muszak_input = htmlspecialchars(trim($_POST['muszak_input']));

        if ($idopont_input === "" || $muszak_input === "") 
        {
            $response["insert_error"] = "Hiányzó mezők";
        } 
        else 
        {
            if ($idopont_ido === "") 
            {
                $idopont_ido = "00:00";
            }

            $idopont = $idopont_input . " " . $idopont_ido . ":00";
            $idopont2 = $idopont_input2 . " " . $idopont_ido2 . ":00";

            $nevek = explode(" ", $muszak_input, 2); // Részválasztás.

            $vezeteknev = $nevek[0];
            $keresztnev = $nevek[1];

            $sql = "INSERT INTO csekkolasok (Vezeteknev, Keresztnev, Datum_Be, Datum_Ki) VALUES (?, ?, ?, ?)"; // Adatok feltöltése csekkolásba.
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $vezeteknev, $keresztnev, $idopont, $idopont2);

            if ($stmt->execute()) // Válasz visszadása.
            {
                $response["insert_success"] = true;
            } 
            else 
            {
                $response["insert_error"] = "Hiba az esemény hozzáadása során";
            }
            
            $stmt->close();
        }
    }

    echo json_encode($response); // JSON-á konvertálás...

    $conn->close();
} 
else 
{
    echo json_encode(["success" => false, "error" => "Hozzáférés megtagadva"]);
}
?>
