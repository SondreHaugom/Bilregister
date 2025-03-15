<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrerte biler</title>
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
    <table>
        <tr>
            <th>Registrerings nummer:</th>
            <th>Merke:</th>
            <th>Type bil:</th>
            <th>Farge:</th> 
            <th>Slett bil</th>
            <th>Rediger</th>
        </tr>
        <?php
        // Koble til databasen
        $conn = mysqli_connect("localhost", "root", "", "bilregister");
        if ($conn->connect_error) {
            die("Feil med koblingen av databasen: " . $conn->connect_error);
        }

        // SQL-spørring for å hente data
        $sql = "SELECT * FROM `biler`";
        $result = $conn->query($sql);  // Korrekt metode er query()

        if ($result->num_rows > 0) {
            // Hent ut rader og vis dem i tabellen
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["RegNr"] . "</td>";
                echo "<td>" . $row["Type"] . "</td>";
                echo "<td>" . $row["Merke"] . "</td>";
                echo "<td>" . $row["Farge"] . "</td>";
                // Legg til en sletteknapp
                echo  "<td>
                <form action='slettBil.php' method='POST' onsubmit='return confirm(\"Er du sikker på at du vil slette " . htmlspecialchars($row['Type']) . "?\");'>
                    <input type='hidden' name='ID' value='" . $row['RegNr'] . "'>
                    <button type='submit'>Slett</button>
                </form>
                </td>";
                echo "<td>
                <form action='endreBil.php' method='POST'>
                    <input type='hidden' name='ID' value='" . $row['RegNr'] . "'>
                    <button type='submit'>Oppdater</button>
                </form>
                </td>";

            }   
        } else {
            echo "<tr><td colspan='6'>Ingen resultater</td></tr>";
        }

        // Lukk databaseforbindelsen
        $conn->close();
        ?>
    </table>
    </main>
    <footer>

    </footer>
    
</body>
</html>