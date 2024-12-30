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
    private $host = "localhost"; // Indirizzo del server del database
    private $user = "nome_utente"; // Nome utente del database
    private $password = "password"; // Password del database
    private $database = "nome_database"; // Nome del database
    private $conn;

    public function __construct($host = null, $user = null, $password = null, $database = null) {
        if ($host) $this->host = $host;
        if ($user) $this->user = $user;
        if ($password) $this->password = $password;
        if ($database) $this->database = $database;

        $this->connect();
    }

    private function connect() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connessione fallita: " . $this->conn->connect_error);
        }
        $this->conn->set_charset("utf8mb4"); // Imposta la codifica a UTF-8 per supportare caratteri speciali
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

        public function escape_string($string){
                return $this->conn->real_escape_string($string);
        }
}

?>

```