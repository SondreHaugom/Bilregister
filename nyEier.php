<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ny eier</title>
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
        <form action="eierRegistering.php" method="POST">
        <label for="FD">Førdelsnummer</label required>
        <input type="text" name="FD" id="FD">
        <label for="fornavn">Fornavn</label required>
        <input type="text" name="fornavn" id="fornavn"> 
        <label for="etternavn">Etternavn</label required>
        <input type="text" name="etternavn" id="etternavn">
        <label for="adresse">Adresse</label required>
        <input type="text" name="adresse" id="adresse">
        <label for="postnr">Postnr</label required>
        <input type="text" name="postnr" id="postnr">
        <label for="epost">Epost</label required>
        <input type="text" name="epost" id="epost">
        <label for="tlf">Telefonnummer</label required>
        <input type="text" name="tlf" id="tlf">
        <button type="submit">Registrer eier</button>
        </form>
      
      
    </main>
    <footer>

    </footer>
    
</body>
</html>