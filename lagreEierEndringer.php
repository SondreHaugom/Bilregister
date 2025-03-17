<?php
// Opprett databaseforbindelse
try {
    $conn = new PDO("mysql:host=localhost;dbname=bilregister;charset=utf8", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kunne ikke koble til databasen: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['FD'])) {
    $FD = $_POST["FD"]; // Hent fødselsnummer fra POST-data
    $fornavn = $_POST["fornavn"];
    $etternavn = $_POST["etternavn"];
    $epost = $_POST["epost"];
    
    // SQL-spørring for å oppdatere eierens data
    $sql = "UPDATE eiere SET fornavn = :fornavn, etternavn = :etternavn, epost = :epost WHERE FD = :FD";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':FD', $FD);
    $stmt->bindParam(':fornavn', $fornavn);
    $stmt->bindParam(':etternavn', $etternavn);
    $stmt->bindParam(':epost', $epost);
    $stmt->execute();
    
    // Omdiriger til registrerteEiere.php etter vellykket oppdatering
    header("Location: registrerteEiere.php");
    exit();
} else {
    die('Mangler ID for eieren.');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oppdater Eier</title>
</head>
<body>
    Oppdater eier
</body>
</html>