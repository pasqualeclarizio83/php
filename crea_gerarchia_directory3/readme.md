# Breve Tutorial

Il Progetto permette di creare una o più categorie.
In base alla categoria creata, puoi creare delle sottocategorie.


Hierarchical Category Tree View with Php


## Descrizione

Permette la possibilità di creare delle directory ad albero

nested categories in php

```bash
# Esempio
-- Tabelle

CREATE TABLE Directory (
    directory_id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    parent_directory_id INT,
    FOREIGN KEY (parent_directory_id) REFERENCES Directory(directory_id) ON DELETE CASCADE
);

```


## Descrizione
Home page

```bash
# Esempio
http://127.0.0.1/crea_gerarchia_directory3/

```
