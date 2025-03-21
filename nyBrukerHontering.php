<?php
// Path: nyBrukerHontering.php
$server = "localhost"; 
$dbname = "bilregister";
$username = "root"; 
$password = "";

// Skaper en forbindelse
$conn = new mysqli($server, $username, $password, $dbname);

// Sjekker forbindelsen
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Hent data fra skjemaet
    $innsendtBrukernavn = $_POST['brukernavn'];
    $innsendtnavn = $_POST['navn'];
    $innsendtPassord = ($_POST['passord']); // Krypter passordet

    // SQL-spørring for å sette inn data i tabellen 'brukere'
    $sql = "INSERT INTO brukere (brukernavn, navn, passord) 
            VALUES (?, ?, ?)";

    // Forbered spørringen
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Feil i SQL-spørringen: " . $conn->error);
    }

    $stmt->bind_param("sss", $innsendtBrukernavn, $innsendtnavn, $innsendtPassord);

    // Utfør spørringen og sjekk for feil
    if ($stmt->execute()) {
        echo "Ny bruker ble lagt til!";
    } else {
        echo "Feil: " . $stmt->error;
    }

    // Lukk statement og forbindelse
    $stmt->close();
    $conn->close();
}
?>