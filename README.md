## PHP

#### Immagina PHP come un cuoco esperto che prepara piatti deliziosi (pagine web dinamiche) seguendo una ricetta (il tuo codice PHP). Questo cuoco lavora in una cucina molto attrezzata (il server web) e ha a disposizione tanti ingredienti (funzioni, librerie) per creare piatti sempre nuovi e gustosi.

### Perché PHP è così popolare?

#### Facile da imparare: La sintassi di PHP è abbastanza simile al linguaggio inglese, rendendolo accessibile anche ai principianti.
#### Ampiamente utilizzato: È presente su quasi tutti i server web, quindi è molto facile trovare hosting che lo supportano.
#### Comunità vasta: Essendo uno dei linguaggi più vecchi e popolari, ha una comunità molto attiva che offre supporto, risorse e librerie.
#### Perfetto per il web: È stato creato appositamente per lo sviluppo web, quindi è ottimizzato per creare siti dinamici e interattivi.

### Potenzialità di PHP:
#### Siti web dinamici: Può creare qualsiasi tipo di sito web, da un semplice blog a un e-commerce complesso.
#### Database: Interagisce facilmente con i database (come MySQL) per gestire grandi quantità di dati.
#### CMS: Molti dei CMS più famosi (WordPress, Joomla, Drupal) sono scritti in PHP.
#### Frameworks: Offre diversi framework (come Laravel, Symfony) che semplificano lo sviluppo di applicazioni web complesse.

### Pregi e Difetti rispetto ad Altri Linguaggi Interpretati

#### Pregi:
#### Facile da imparare: La curva di apprendimento è relativamente bassa.
#### Ampia diffusione: Facile trovare hosting e risorse che permettano di "farlo girare".
#### Maturo e stabile: Ha una lunga storia e una comunità solida.

### Difetti:
#### Meno rigoroso: A volte può portare a codice meno strutturato e più soggetto a errori.
#### Performance: Può essere meno performante di linguaggi compilati come C++ per applicazioni che richiedono molte risorse.
#### Evoluzione rapida: Le nuove versioni possono introdurre cambiamenti che richiedono aggiornamenti.

### Confronto con altri linguaggi interpretati (Python, JavaScript):

#### Python: Più versatile, utilizzato anche per data science e machine learning, ma spesso considerato più lento per applicazioni web ad alte prestazioni.

#### JavaScript: Principalmente utilizzato per lo sviluppo front-end, ma con Node.js può essere utilizzato anche per il back-end. Offre un ecosistema molto ricco e una sintassi moderna.

# PHP - BASI COMPLETE

### Una Classe per gestire la connessione del DB

[Inizio](https://github.com/pasqualeclarizio83/php/blob/main/inizio.png)

Classe: Database.php

```php

<?php

class Database {
    private $conn;

    public function __construct($host, $user, $password, $database) {
        $this->connect($host, $user, $password, $database);
    }

    private function connect($host, $user, $password, $database) {
        $this->conn = new mysqli($host, $user, $password, $database);

        if ($this->conn->connect_error) {
            die("Connessione fallita: " . $this->conn->connect_error);
        }
                // Imposta la codifica a UTF-8 per supportare caratteri speciali (raccomandato)
                $this->conn->set_charset("utf8mb4");
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        if ($this->conn) {
            $this->conn->close();
        }
    }

    public function query($sql) {
        $result = $this->conn->query($sql);
        if (!$result) {
            die("Errore nella query: " . $this->conn->error);
        }
        return $result;
    }

    public function escape_string($string) {
        return $this->conn->real_escape_string($string);
    }

    public function insert($table, $data) {
        // ... (come negli esempi precedenti)
    }
}

?>

```


config.php


```php

<?php
// config.php
$db_host = "localhost"; // o l'indirizzo del tuo server MySQL
$db_user = "tuo_utente"; // il tuo username MySQL
$db_password = "tua_password"; // la tua password MySQL
$db_name = "tuo_database"; // il nome del tuo database
?>

```


leggi_utenti.php

```php

<?php
require_once 'config.php'; // Includi il file di configurazione
require_once 'Database.php'; // Includi la classe Database

try {
    // Crea un'istanza della classe Database con i dati di configurazione
    $db = new Database($db_host, $db_user, $db_password, $db_name);

    // Query per selezionare tutti gli utenti (adatta la query alle tue esigenze)
    $sql = "SELECT id, nome, cognome, email FROM Utenti";

    // Esegui la query
    $result = $db->query($sql);

    // Verifica se ci sono risultati
    if ($result->num_rows > 0) {
        echo "<h2>Elenco Utenti</h2>";
        echo "<table border='1'>"; // Aggiunto bordo per visualizzazione tabella
        echo "<tr><th>ID</th><th>Nome</th><th>Cognome</th><th>Email</th></tr>";

        // Itera sui risultati e mostra i dati in una tabella
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nome"] . "</td>";
            echo "<td>" . $row["cognome"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Nessun utente trovato nel database.</p>";
    }

    // Chiudi la connessione (fondamentale!)
    $db->closeConnection();

} catch (Exception $e) {
    // Gestione degli errori (mostra un messaggio di errore)
    echo "Errore: " . $e->getMessage();
}
?>

```

Tabella: Utenti

```php


CREATE TABLE Utenti (
    id INT AUTO_INCREMENT PRIMARY KEY, -- ID univoco e autoincrementante
    nome VARCHAR(255) NOT NULL,       -- Nome dell'utente (massimo 255 caratteri, obbligatorio)
    cognome VARCHAR(255) NOT NULL,    -- Cognome dell'utente (massimo 255 caratteri, obbligatorio)
    email VARCHAR(255) UNIQUE NOT NULL, -- Email dell'utente (massimo 255 caratteri, univoca e obbligatoria)
    data_registrazione TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Data e ora di registrazione (impostata automaticamente)
);

```

[Utenti](https://github.com/pasqualeclarizio83/php/blob/main/Utenti.png)

### Gestione Progetto

#### Di seguito è struttato il progetto, costituito da diversi files, prettamente da Classi che permettono di gestire le CRUD
#### in linguaggio PHP
#### Il config è importante

ma è anche bene strutturare la tabella, ovvero:

File SQL. Lo puoi copiare e puoi eseguirlo.

[SQL](https://github.com/pasqualeclarizio83/php/blob/main/SQL.png)

```php

CREATE TABLE utenti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

```


[Progetto](https://github.com/pasqualeclarizio83/php/blob/main/Progetto.png)


config.php
```php

<?php
// Parametri di connessione al database
define('DB_HOST', 'localhost');  // Host del database
define('DB_NAME', 'db_prova');  // Nome del database
define('DB_USERNAME', 'root');  // Username del database
define('DB_PASSWORD', 'student');  // Password del database
?>

```


create.php
```php

<?php
require_once 'Database.php';
require_once 'Crud.php';
require_once 'Layout.php';

// Configurazione
$db = new Database();
$conn = $db->getConnection();
$table = 'utenti';
$crud = new Crud($conn, $table);
$layout = new Layout();

// Rende l'intestazione
$layout->renderHeader("Crea Nuovo Utente");

// Gestisce l'invio del modulo
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fields = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email']
    ];
    if ($crud->create($fields)) {
        echo "Utente creato con successo!";
    } else {
        echo "Errore nella creazione dell'utente.";
    }
}

// Mostra il modulo
$layout->renderForm(['nome' => '', 'email' => ''], 'create.php');

// Rende il piè di pagina
$layout->renderFooter();
?>


```

Crud.php
```php

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


```


Database.php

```php

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


```


delete.php

```php

<?php
require_once 'Database.php';
require_once 'Crud.php';
require_once 'Layout.php';

// Configurazione
$db = new Database();
$conn = $db->getConnection();
$table = 'utenti';
$crud = new Crud($conn, $table);
$layout = new Layout();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($crud->delete($id)) {
        echo "Utente eliminato con successo!";
    } else {
        echo "Errore nell'eliminazione dell'utente.";
    }
}

header('Location: index.php');
?>


```


index.php

```php

<?php
require_once 'Database.php';
require_once 'Crud.php';
require_once 'Layout.php';

// Configurazione
$db = new Database();
$conn = $db->getConnection();
$table = 'utenti';
$crud = new Crud($conn, $table);
$layout = new Layout();

// Rende l'intestazione
$layout->renderHeader("Lista Utenti");

// Ottiene i dati dalla tabella
$utenti = $crud->read();

// Visualizza i dati nella tabella
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Azioni</th>
        </tr>";

// Itera sugli utenti e mostra le righe della tabella
foreach ($utenti as $utente) {
    echo "<tr>
            <td>{$utente['id']}</td>
            <td>{$utente['nome']}</td>
            <td>{$utente['email']}</td>
            <td>
                <a href='update.php?id={$utente['id']}'>Modifica</a> | 
                <a href='delete.php?id={$utente['id']}'>Cancella</a>
            </td>
          </tr>";
}

echo "</table>";

// Rende il piè di pagina
$layout->renderFooter();
?>

```

Layout.php

```php

<?php
class Layout {
    // Funzione per rendere l'intestazione della pagina
    public function renderHeader($title = "Gestione CRUD") {
        echo "<!DOCTYPE html><html lang='it'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>{$title}</title>
                    <style>
                        body { font-family: Arial, sans-serif; margin: 20px; }
                        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
                        table, th, td { border: 1px solid black; }
                        th, td { padding: 10px; text-align: left; }
                        nav { margin: 10px 0; }
                        nav a { margin: 0 15px; text-decoration: none; font-weight: bold; }
                        form { margin: 20px 0; }
                    </style>
                </head>
                <body>";
        echo "<nav><a href='index.php'>Home</a> | <a href='create.php'>Aggiungi</a></nav>";
        echo "<h1>{$title}</h1>";
    }

    // Funzione per rendere il piè di pagina
    public function renderFooter() {
        echo "</body></html>";
    }

    // Funzione per rendere una tabella con i dati
    public function renderTable($data) {
        echo "<table><thead><tr>";
        if (!empty($data)) {
            foreach (array_keys($data[0]) as $key) {
                echo "<th>{$key}</th>";
            }
            echo "</tr></thead><tbody>";
            foreach ($data as $row) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>{$value}</td>";
                }
                echo "</tr>";
            }
            echo "</tbody>";
        } else {
            echo "<tr><td colspan='5'>Nessun dato disponibile</td></tr>";
        }
        echo "</table>";
    }

    // Funzione per il modulo di creazione/aggiornamento
    public function renderForm($fields, $action) {
        echo "<form action='{$action}' method='POST'>";
        foreach ($fields as $field => $value) {
            echo "<label for='{$field}'>{$field}:</label>";
            echo "<input type='text' id='{$field}' name='{$field}' value='{$value}' required><br>";
        }
        echo "<button type='submit'>Invia</button>";
        echo "</form>";
    }
}
?>


```

update.php

```php

<?php
require_once 'Database.php';
require_once 'Crud.php';
require_once 'Layout.php';

// Configurazione
$db = new Database();
$conn = $db->getConnection();
$table = 'utenti';
$crud = new Crud($conn, $table);
$layout = new Layout();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = $crud->readOne($id);

    // Rende l'intestazione
    $layout->renderHeader("Aggiorna Utente");

    // Gestisce l'invio del modulo
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fields = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email']
        ];
        if ($crud->update($fields, $id)) {
            echo "Utente aggiornato con successo!";
        } else {
            echo "Errore nell'aggiornamento dell'utente.";
        }
    }

    // Mostra il modulo
    $layout->renderForm($user, 'update.php?id=' . $id);

    // Rende il piè di pagina
    $layout->renderFooter();
} else {
    echo "ID non specificato.";
}
?>


```

#### Reperibile da qui

[Progetto](https://github.com/pasqualeclarizio83/php/tree/main/progetto)