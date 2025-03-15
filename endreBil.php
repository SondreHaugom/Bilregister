<?php
// Opprett databaseforbindelse
try {
    $conn = new PDO("mysql:host=localhost;dbname=bilregister;charset=utf8", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kunne ikke koble til databasen: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ID'])) {
    $regNr = $_POST["ID"]; // Hent registreringsnummer fra POST-data
} else {
    die('Mangler ID for bilen.');
}

// Hent data fra databasen for den aktuelle bilen
$sql = "SELECT * FROM biler WHERE RegNr = :RegNr";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Feil i SQL-spørringen.");
}

$stmt->execute([':RegNr' => $regNr]);
$bil = $stmt->fetch();

if (!$bil) {
    die('Bilen finnes ikke.');
}

// Vis data for redigering (HTML-skjema)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rediger Bil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <h1>Rediger Bil</h1>
    </header>
    


    <main>
    <form action="lagreBilEndringer.php" method="POST">
        <input type="hidden" name="RegNr" value="<?php echo htmlspecialchars($bil['RegNr']); ?>">
        <label for="Type">Type:</label>
        <input type="text" name="Type" id="Type" value="<?php echo htmlspecialchars($bil['Type']); ?>" required><br>
        <label for="Merke">Merke:</label>
        <input type="text" name="Merke" id="Merke" value="<?php echo htmlspecialchars($bil['Merke']); ?>" required><br>
        <label for="Farge">Farge:</label>
        <input type="text" name="Farge" id="Farge" value="<?php echo htmlspecialchars($bil['Farge']); ?>" required><br>
        <button type="submit">Lagre Endringer</button>
    </form>
    </main>

</body>
</html>