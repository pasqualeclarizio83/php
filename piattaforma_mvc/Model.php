<?php
class Model {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Funzione di esempio per ottenere tutti gli utenti
    public function getAllUsers() {
        $query = "SELECT * FROM users";
        $result = $this->db->query($query);

        // Restituisci i risultati sotto forma di array
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Funzione di esempio per ottenere un utente per ID
    public function getUserById($userId) {
        $query = "SELECT * FROM users WHERE id = $userId";
        $result = $this->db->query($query);

        // Restituisci i risultati sotto forma di array
        return $result->fetch_assoc();
    }

    // Aggiungi altre funzioni secondo necessità
}
?>
