<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log inn</title>
</head>
<body>
    <header>
        <a href="">hjem</a>
        <a href="">Log inn</a>
        <a href="">Registrerte biler</a>
        <a href="">Brukere</a>
    </header>
    <main>
        <form action="innlogging_hontering.php" method="POST">
            <label for="brukernavn">Brukernavn</label>
            <input type="text" name="brukernavn" id="brukernavn">
            <label for="passord">Passord</label>
            <input type="password" name="passord" id="passord">
            <button type="submit">Logg inn</button>
        </form>
    </main>
    <footer>

    </footer>
</body>
</html>