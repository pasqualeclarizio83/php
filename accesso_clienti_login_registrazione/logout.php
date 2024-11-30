<?php
// Includi il file di connessione al database
include('connessione.php');

// Avvia la sessione
session_start();

// Elimina tutte le variabili di sessione
session_unset();

// Distruggi la sessione
session_destroy();

// Reindirizza alla pagina di login
header("Location: login.html");
exit();
?>