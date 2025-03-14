<?php
session_start();  // Start session
session_destroy();  // Ødelegger alle data i sesjonen
header('Location: login.php');  // Sender brukeren til login-siden etter utlogging
exit;  // Sørger for at koden stopper etter headeren
?>
