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

    // Aggiungi altre funzioni secondo necessità
}
?>
