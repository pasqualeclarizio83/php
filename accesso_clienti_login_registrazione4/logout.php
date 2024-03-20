<?php
session_start(); // Inizia la sessione

// Cancella tutte le variabili di sessione
$_SESSION = array();

// Cancella il cookie di sessione, se presente
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}

// Distruggi la sessione
session_destroy();

// Reindirizza alla pagina di login dopo 5 secondi
header("Refresh: 5; URL=login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Logout completato</h1>
    <p>Sei stato disconnesso dal tuo account.</p>
    <p>Verrai reindirizzato alla pagina di login tra 5 secondi...</p>
</body>
</html>