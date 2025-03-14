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
        <a href="registrerteBiler.php">Registrerte biler</a>
        <a href="">Brukere</a>
    </nav>
    </header>
    <main>
        <form action="bil_hontering.php" method="POST">
            <a href="nyEier.php">Ny eier</a>
            <label for="regnr">Registreringsnummer</label>
            <input type="text" name="regnr" id="regnr" required>
            <label for="merke">Type</label>
            <input type="text" name="type" id="type" required>
            <label for="modell">Modell</label>
            <input type="text" name="modell" id="modell" required>
            <label for="farge">Farge</label>
            <input type="text" name="farge" id="farge" required>
            <label for="eier">Førdelsnummer</label>
            <input type="text" name="FD" id="FD" required>
            <button type="submit">Registrer bil</button>
        </form>
    </main>
    <footer>

    </footer>
</body>
</html>