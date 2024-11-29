## PHP RUBRICA API

### Se creassi un Database: db_rubrica

#### Tabella: rubrica

#### SQL

```
CREATE TABLE rubrica (
    id INT AUTO_INCREMENT PRIMARY KEY,         -- Identificatore univoco per ogni contatto
    nome VARCHAR(100) NOT NULL,                -- Nome del contatto
    cognome VARCHAR(100) NOT NULL,             -- Cognome del contatto
    telefono VARCHAR(15) NOT NULL,             -- Numero di telefono del contatto
    email VARCHAR(100),                        -- Email del contatto (opzionale)
    indirizzo VARCHAR(255),                    -- Indirizzo del contatto (opzionale)
    data_creazione TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- Data e ora in cui il contatto è stato aggiunto
);

```