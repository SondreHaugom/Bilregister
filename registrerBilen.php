<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrer bilen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <nav>
        <a href="index.php">hjem</a>
        <a href="login.php">Log inn</a>
        <a href="registrerBilen.php">Registrer bilen din</a>
        <a href="">Registrerte biler</a>
        <a href="">Brukere</a>
    </nav>
    </header>
    <main>
        <form action="bil_hontering.php" method="POST">
            <a href="">Ny eier</a>
            <label for="regnr">Registreringsnummer</label required>
            <input type="text" name="regnr" id="regnr">
            <label for="merke">Type</label required>
            <input type="text" name="type" id="type">
            <label for="modell">Modell</label required>
            <input type="text" name="modell" id="modell">
            <label for="farge">Farge</label required>
            <input type="text" name="farge" id="farge">
            <label for="eier">Førdelsnummer</label required>
            <input type="text" name="FD" id="FD">
            <button type="submit">Registrer bil</button>
        </form>
    </main>
    <footer>

    </footer>
</body>
</html>