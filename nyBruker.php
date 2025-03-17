<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ny Bruker</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <a href="login.php">Log inn</a>
        <a href="registrerBilen.php">Registrer bilen din</a>
        <a href="registrerteBiler.php">Registrerte biler</a>
        <a href="registrerteEiere.php">Brukere</a>
    </header>
    <main>
    <h1>
        Velkommen til bilregisterert
    </h1>
    <form action="nyBrukerHontering.php" method="post">
        <label for="brukernavn">Brukernavn</label required>
        <input type="text" name="brukernavn" id="brukernavn">
        <label for="navn">Fult navn</label >
        <input type="text" name="navn" id="navn" required>
        <label for="organisasjon">Organisasjon</label>
        <input type="text" name="organisasjon" id="organisasjon" required>
        <label for="passord">Passord</label>
        <input type="password" name="passord" id="passord" required>
        <button type="submit">Registrer</button>
    </main>
    <footer>

    </footer>
</body>
</html>