<?php
session_start(); // Start session tidlig
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log inn</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <?php
         include 'nav.php';
        ?>
    </header>
    <main>
        <form action="innlogging_hontering.php" method="POST">
            <a href="nyBruker.php">Ny Bruker</a>
            <label for="brukernavn">Brukernavn</label >
            <input type="text" name="brukernavn" id="brukernavn" required>
            <label for="passord">Passord</label>
            <input type="password" name="passord" id="passord" required>
            <button type="submit">Logg inn</button>
        </form>
        <form action="loggut.php" method="POST">
            <button type="submit">Logg ut</button>
        </form>

        <?php
        // Feilmelding når sesjonen er aktiv eller ikke
        if (isset($_SESSION['bilregister']) && $_SESSION['bilregister'] == true) {
            echo "Du er nå logget inn";
        } else {
            echo "Du er logget ut";
        }
        ?>
    </main>
    <footer></footer>
</body>
</html>
