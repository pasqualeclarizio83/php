# Breve Tutorial

Struttura in Php che ci permette di effettuare Registrazione
e identificazione.
E' bene separare il file di connessione
E' bene anche creare una dashboard

## Descrizione

Crea la tabella Utenti.

```bash
# Esempio
CREATE TABLE Utenti (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(50) NOT NULL,
    Cognome VARCHAR(50) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    Password VARCHAR(100) NOT NULL
);

```


## Descrizione
Come accedere? Dipende dall'installazione del vostro Web Server Apache
Per registrarsi. L'utente sarà inserito nella Tabella Utenti del Database

```bash
# Esempio
http://127.0.0.1/struttura_mvc/register.html

```


## Descrizione
Come accedere? Dipende dall'installazione del vostro Web Server Apache
Per identificarsi? Login

```bash
# Esempio
http://127.0.0.1/struttura_mvc/login.html

```
