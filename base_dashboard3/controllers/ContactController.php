<?php

class ContactController {
    public function index() {
        $data = array('pageTitle' => 'Contatti');
        include 'views/contact.php';
    }

    public function submit() {
        // Logica per elaborare il modulo di contatto
        // Potresti aggiungere una funzione per gestire l'invio del modulo.
    }
}
?>