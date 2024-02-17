<?php
class UserController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    // Funzione di esempio per visualizzare la lista degli utenti
    public function index() {
        $users = $this->model->getAllUsers();

        // Carica il template HTML per la lista degli utenti
        include('templates/header.php');
        include('templates/users_list.php');
        include('templates/footer.php');
    }

    // Aggiungi altre funzioni secondo necessità
}
?>
