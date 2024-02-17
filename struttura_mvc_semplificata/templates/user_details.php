<!-- Template per i dettagli dell'utente -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
</head>
<body>
    <h1>User Details</h1>
    <?php
    // Includi il template della vista
    include 'views/UserView.class.php';
    
    // Simula il recupero dei dati dell'utente dal modello o dal database
    $userData = array('username' => 'JohnDoe');
    
    // Crea un'istanza del modello con i dati dell'utente
    $user = new UserModel($userData['username']);
    
    // Chiama la vista per mostrare i dettagli dell'utente
    UserView::showUserDetails($user);
    ?>
</body>
</html>
