<?php
// Includi il file di connessione al database
include('connessione.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .dashboard-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        .profile-info {
            margin-top: 20px;
            padding: 10px;
            background-color: #f8f8f8;
            border-radius: 5px;
        }

        a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <?php
    // Verifica se l'utente è autenticato
    session_start();

    if (!isset($_SESSION['id_utente'])) {
        // Se l'utente non è autenticato, reindirizza alla pagina di accesso
        header("Location: login.html");
        exit();
    }

    // Ottieni l'ID dell'utente autenticato dalla sessione
    $id_utente = $_SESSION['id_utente'];

    // Query per ottenere le informazioni del profilo dell'utente autenticato
    $sql = "SELECT * FROM Utenti WHERE ID = '$id_utente'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Utente trovato, visualizza le informazioni del profilo
        $row = $result->fetch_assoc();
        echo "<h1>Benvenuto, " . $row['Nome'] . " " . $row['Cognome'] . "!</h1>";
        echo "<div class='profile-info'>";
        echo "Email: " . $row['Email'];

        // Aggiungi il link per effettuare il logout
        echo "<br><a href='logout.php'>Logout</a>";
        echo "</div>";
    } else {
        echo "<p>Errore nel recupero delle informazioni del profilo.</p>";
    }

    // Chiudi la connessione
    $conn->close();
    ?>
</div>

</body>
</html>