<?php
class Crud {
    private $conn;
    private $table_name;

    // Costruttore che accetta connessione e nome della tabella
    public function __construct($db, $table_name) {
        $this->conn = $db;
        $this->table_name = $table_name;
    }

    // CREATE: Aggiungi un nuovo record
    public function create($fields) {
        $columns = implode(", ", array_keys($fields));
        $placeholders = ":" . implode(", :", array_keys($fields));
        $query = "INSERT INTO {$this->table_name} ({$columns}) VALUES ({$placeholders})";
        $stmt = $this->conn->prepare($query);

        // Associa i valori ai segnaposto
        foreach ($fields as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }

    // READ: Leggi tutti i record
    public function read() {
        $query = "SELECT * FROM {$this->table_name}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // UPDATE: Modifica un record
    public function update($fields, $id) {
        $set = "";
        foreach ($fields as $key => $value) {
            $set .= "$key = :$key, ";
        }
        $set = rtrim($set, ', ');
        $query = "UPDATE {$this->table_name} SET {$set} WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Associa i valori ai segnaposto
        foreach ($fields as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }

    // DELETE: Elimina un record
    public function delete($id) {
        $query = "DELETE FROM {$this->table_name} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }

    // Leggi un singolo record
    public function readOne($id) {
        $query = "SELECT * FROM {$this->table_name} WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
