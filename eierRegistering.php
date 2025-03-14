<?php
$server = "localhost";
$database = "bilregister";
$username = "root";
$password = "";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $FD = $_POST['FD'];
    $fornavn = $_POST['fornavn'];
    $etternavn = $_POST['etternavn'];
    $adresse = $_POST['adresse'];
    $postnr = $_POST['postnr'];
    $epost = $_POST['epost'];
    $tlf = $_POST['tlf'];

    $sql = "INSERT INTO eiere (FD, fornavn, etternavn, adresse, postnr, epost, tlf) 
    VALUES ('$FD', '$fornavn', '$etternavn', '$adresse', '$postnr', '$epost', '$tlf')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Ny eier registrert";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>