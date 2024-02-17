<?php
// Controller dell'utente
class UserController {
    public static function getUserDetails() {
        // Simula il recupero dei dati dell'utente dal modello o dal database
        $userData = array('username' => 'JohnDoe');
        
        // Crea un'istanza del modello con i dati dell'utente
        $user = new UserModel($userData['username']);
        
        // Chiama la vista per mostrare i dettagli dell'utente
        UserView::showUserDetails($user);
    }
}
?>
