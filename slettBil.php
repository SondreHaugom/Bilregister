<?php
// Slett bil fra databasen
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $regNr = $_POST["ID"]; // Bruker registreringsnummer, ikke et tall

    // Koble til databasen
    $conn = new PDO("mysql:host=localhost;dbname=bilregister;charset=utf8", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // SQL-spørring for å slette data
    $sql_slett = "DELETE FROM biler WHERE RegNr = :regNr";
    // Prepared statement
    $stmt = $conn->prepare($sql_slett);
    // Bind parameters
    $stmt->bindValue(':regNr', $regNr, PDO::PARAM_STR); // Endret til STRING istedenfor INT

    // Utfør spørringen
    if ($stmt->execute()) {
        echo "Bilen med registreringsnummer $regNr er slettet.";
    } else {
        echo "Noe gikk galt ved sletting.";
    }
}
// Redirect tilbake til registrerteBiler.php
header("Location: registrerteBiler.php");
// Avslutt scriptet
exit();
?>
