<?php
session_start(); // Avvia la sessione per accedere alle variabili di sessione

// Controlla se l'utente è autenticato
if (!isset($_SESSION['id']) || !isset($_SESSION['email'])) {
    // Se l'utente non è autenticato, reindirizzalo alla pagina di login
    header("Location: login.php");
    exit(); // Interrompe l'esecuzione dello script dopo il reindirizzamento
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profilo Utente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Benvenuto nel tuo profilo</h1>
    <p>Qui puoi visualizzare e modificare le informazioni del tuo profilo.</p>
    <a href="logout.php" class="btn btn-danger">Disconnetti</a>
</body>
</html>