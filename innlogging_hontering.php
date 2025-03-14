<?php
// Start session
session_start();
// Koble til database
$server = "localhost";
$database = "bilregister";
$dbUser = "root";
$dbPassword = "";
// Prøv å koble til databasen
try {
    $conn = new PDO("mysql:host=$server;dbname=$database;charset=utf8", $dbUser, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Koblet til databasen $database på $server";
} catch (PDOException $e) {
    die("Kunne ikke koble til databasen: " . $e->getMessage());
}
// Sjekk om brukeren er logget inn
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Hent data fra skjema
    $innsendtNavn = $_POST['brukernavn'];
    $innsendtPassord = $_POST['passord'];


    // Sjekk om brukeren finnes i databasen
    $sql = "SELECT * FROM brukere WHERE brukernavn = ? AND passord = ?";
    // Prepared statement
    $stmt = $conn->prepare($sql);
    // Bind execute parameters
    $stmt->execute([$innsendtNavn, $innsendtPassord]);
    // Sjekk om brukeren finnes
    if ($stmt->rowCount() > 0) {
        $_SESSION['bilregister'] = true;
        header('Location: login.php');
        exit;
    } else {
        echo "<p>Feil brukernavn eller passord!</p>";
    }
}
?>