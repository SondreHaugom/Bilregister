<?php
// Opprett databaseforbindelse
try {
    $conn = new PDO("mysql:host=localhost;dbname=bilregister;charset=utf8", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kunne ikke koble til databasen: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['RegNr'])) {
    $regNr = $_POST["RegNr"]; // Hent registreringsnummer fra POST-data
    $type = $_POST["Type"];
    $merke = $_POST["Merke"];
    $farge = $_POST["Farge"];
    $sql = "UPDATE biler SET Type = :Type, Merke = :Merke, Farge = :Farge WHERE RegNr = :RegNr";
    
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':RegNr', $regNr);
    $stmt->bindParam(':Type', $type);
    $stmt->bindParam(':Merke', $merke);
    $stmt->bindParam(':Farge', $farge);
    $stmt->execute();
    header("Location: registrerteBiler.php");
    exit();

    
}
else {
    die('Mangler ID for bilen.');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Oppdater bil
</body>
</html>