<?php
require_once 'config.php';  // Importa la configurazione del database

class Database {
    private $conn;

    // Funzione per ottenere la connessione al database
    public function getConnection() {
        if ($this->conn === null) {
            try {
                // Connessione PDO al database
                $this->conn = new PDO(
                    "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
                    DB_USERNAME,
                    DB_PASSWORD
                );
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $exception) {
                echo "Connessione fallita: " . $exception->getMessage();
            }
        }
        return $this->conn;
    }
}
?>
