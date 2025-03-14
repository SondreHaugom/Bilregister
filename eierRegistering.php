<?php
// kobler til database
$server = "localhost";
$database = "bilregister";
$username = "root";
$password = "";
// skaper tilkobling
$conn = mysqli_connect($server, $username, $password, $database);
// sjekker tilkobling
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Sjekker om det er en POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Henter data fra skjema
    $FD = $_POST['FD'];
    $fornavn = $_POST['fornavn'];
    $etternavn = $_POST['etternavn'];
    $adresse = $_POST['adresse'];
    $postnr = $_POST['postnr'];
    $epost = $_POST['epost'];
    $tlf = $_POST['tlf'];

    // SQL-spørring for å legge til data
    $sql = "INSERT INTO eiere (FD, fornavn, etternavn, adresse, postnr, epost, tlf) 
    VALUES ('$FD', '$fornavn', '$etternavn', '$adresse', '$postnr', '$epost', '$tlf')";
    // Sjekker om spørringen ble utført
    if (mysqli_query($conn, $sql)) {
        echo "Ny eier registrert";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>