# Breve Tutorial

Schema composto da:
- config (permette di collegarci al DB Locale o Remoto). E'importante
- index.php
- registrazione.php
- login.php
- processa_registrazione.php
- processa_login.php
- logout.php (per disconnetterci)
- profilo_utente.php

## Descrizione

Struttura SQL

```bash
# Esempio
CREATE TABLE Ruoli (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_ruolo VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE Utenti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cognome VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE UtentiRuoli (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_utente INT,
    id_ruolo INT,
    FOREIGN KEY (id_utente) REFERENCES Utenti(id) ON DELETE CASCADE,
    FOREIGN KEY (id_ruolo) REFERENCES Ruoli(id) ON DELETE CASCADE
) ENGINE=InnoDB;

```

## Descrizione
I files devono essere copiati sul Server (se lavori in remoto)
In locale ti basta un Web Server Apache

nel mio caso la cartella l'ho chiamata:
accesso_clienti_login_registrazione3

La password viene salvata Decriptata
Questo è molto importante
E anche quando l'utente effettua il Login

```bash
# Esempio
http://127.0.0.1/accesso_clienti_login_registrazione3/

```


## Descrizione
Come accedere? Dipende dall'installazione del vostro Web Server Apache
Per identificarsi? Login
Ma se non ti registri, come fai ad identificarti?

Login

Dopo aver effettuato il login
Verremo indirizzati al profilo utente.
Ho aggiunto questa funzionalità

```bash
# Esempio
http://127.0.0.1/accesso_clienti_login_registrazione3/login.php

```




Registrazione, attraverso email e password
La password viene salvata con Hashing

```bash
# Esempio
http://127.0.0.1/accesso_clienti_login_registrazione3/registrazione.php

```

Gestione del profilo Utente

A breve verranno introdotte altre funzionalità