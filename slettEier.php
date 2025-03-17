<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sjekk om 'FD' er satt i POST-data
    if (!isset($_POST['FD']) || empty($_POST['FD'])) {
        var_dump($_POST); // Debugging for å sjekke POST-data
        die('Fødselsnummer mangler eller er tomt.');
    }

    // Hent fødselsnummer fra POST-data
    $FD = $_POST['FD'];

    try {
        // Koble til databasen
        $conn = new PDO("mysql:host=localhost;dbname=bilregister;charset=utf8", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL-spørring for å slette data
        $sql_slett = "DELETE FROM eiere WHERE FD = :FD LIMIT 1"; // LIMIT 1 sikrer at kun én rad slettes
        $stmt = $conn->prepare($sql_slett);

        // Bind parameter
        $stmt->bindValue(':FD', $FD, PDO::PARAM_STR);

        // Utfør spørringen
        if ($stmt->execute()) {
            // Omdiriger til registrerteEiere.php etter vellykket sletting
            header("Location: registrerteEiere.php?status=success");
            exit();
        } else {
            // Feilmelding hvis slettingen mislykkes
            die("Noe gikk galt ved sletting.");
        }
    } catch (PDOException $e) {
        // Håndter databasefeil
        die("Databasefeil: " . $e->getMessage());
    }
} else {
    // Hvis forespørselen ikke er POST
    die('Ugyldig forespørsel.');
}
?>