<?php
// Path: bil_hontering.php
$server = "localhost"; 
$dbname = "bilregister";
$username = "root"; 
$password = "";

// Skaper en forbindelse
$conn = new mysqli($server, $username, $password, $dbname);

// Skjekker forbindelsen
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Henter data fra skjemaet
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $innsendtRegNr = $_POST['regnr'];
    $innsendtType = $_POST['type'];
    $innsendtModell = $_POST['modell'];
    $innsendtFarge = $_POST['farge'];
    $innsendtFD = $_POST['FD'];

    // Sjekk om bilen allerede finnes i databasen ved å bruke registreringsnummeret
    $sql_check = "SELECT * FROM biler WHERE RegNr = '$innsendtRegNr'";
    $result = $conn->query($sql_check);

    // Hvis bilen allerede er registrert
    if ($result->num_rows > 0) {
        echo "<p>Bilen er allerede registrert!</p>";
    } else {
        // Hvis bilen ikke er registrert, legg den til i databasen
        $sql_insert = "INSERT INTO biler (RegNr, Type, Merke, Farge, FD) VALUES ('$innsendtRegNr', '$innsendtType', '$innsendtModell', '$innsendtFarge', '$innsendtFD')";

        if ($conn->query($sql_insert) === TRUE) {
            echo "<p>Bilen er registrert!</p>";
            header('Location: registrerteBiler.php');  // Sender brukeren tilbake til registrerteBiler.php
        } else {
            echo "<p>Feil i registreringen: " . $conn->error . "</p>";
        }
    }
}

// Lukker tilkoblingen
$conn->close();
?>
