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
        <a href="registrerteEiere.php">Brukere</a>
    </nav> 
    </header>
    <main>
    <table>
        <tr>
            <th>Fødels nummer:</th>
            <th>Fornavn:</th>
            <th>Etternavn:</th>
            <th>Epost:</th> 
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
        $sql = "SELECT * FROM `eiere`";
        $result = $conn->query($sql);  // Korrekt metode er query()

        if ($result->num_rows > 0) {
            // Hent ut rader og vis dem i tabellen
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["FD"] . "</td>";
                echo "<td>" . $row["fornavn"] . "</td>";
                echo "<td>" . $row["etternavn"] . "</td>";
                echo "<td>" . $row["epost"] . "</td>";
                // Legg til en sletteknapp
                echo  "<td>
                <form action='slettEier.php' method='POST' onsubmit='return confirm(\"Er du sikker på at du vil slette " . htmlspecialchars($row['fornavn']) . "?\");'>
                <input type='hidden' name='FD' value='" . $row['FD'] . "'>
                <button type='submit'>Slett</button>
                </form>
                </td>";
                
                echo "<td>
                <form action='endreEier.php' method='POST'>
                    <input type='hidden' name='FD' value='" . $row['FD'] . "'>
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