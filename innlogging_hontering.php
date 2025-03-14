<?php
session_start();
$server = "localhost";
$database = "bilregister";
$dbUser = "root";
$dbPassword = "";

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;charset=utf8", $dbUser, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kunne ikke koble til databasen: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $innsendtNavn = $_POST['brukernavn'];
    $innsendtPassord = $_POST['passord'];



    $sql = "SELECT * FROM brukere WHERE brukernavn = ? AND passord = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$innsendtNavn, $innsendtPassord]);

    if ($stmt->rowCount() > 0) {
        $_SESSION['bilregister'] = true;
        header('Location: login.php');
        exit;
    } else {
        echo "<p>Feil brukernavn eller passord!</p>";
    }
}
?>