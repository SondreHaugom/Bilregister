<?php
// Opprett databaseforbindelse
try {
    $conn = new PDO("mysql:host=localhost;dbname=bilregister;charset=utf8", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kunne ikke koble til databasen: " . $e->getMessage());
}

// Sjekk om POST-forespørselen inneholder 'FD'
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['FD'])) {
    $FD = $_POST["FD"]; // Hent fødselsnummer fra POST-data
} else {
    die('Mangler FD for eieren.');
}

// Hent data fra databasen for den aktuelle eieren
$sql = "SELECT * FROM eiere WHERE FD = :FD";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Feil i SQL-spørringen.");
}

$stmt->execute([':FD' => $FD]);
$eier = $stmt->fetch();

if (!$eier) {
    die('Eieren finnes ikke.');
}

// Vis data for redigering (HTML-skjema)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rediger Eier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Rediger Eier</h1>
    </header>
    <main>
        <form action="lagreEierEndringer.php" method="POST">
            <input type="hidden" name="FD" value="<?php echo htmlspecialchars($eier['FD']); ?>">
            <label for="fornavn">Fornavn:</label>
            <input type="text" name="fornavn" id="fornavn" value="<?php echo htmlspecialchars($eier['fornavn']); ?>" required><br>
            <label for="etternavn">Etternavn:</label>
            <input type="text" name="etternavn" id="etternavn" value="<?php echo htmlspecialchars($eier['etternavn']); ?>" required><br>
            <label for="epost">E-post:</label>
            <input type="email" name="epost" id="epost" value="<?php echo htmlspecialchars($eier['epost']); ?>" required><br>
            <button type="submit">Lagre Endringer</button>
        </form>
    </main>
</body>
</html>