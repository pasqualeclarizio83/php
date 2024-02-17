-- Prima tabella con informazioni sulla città
CREATE TABLE Citta (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    NomeCitta VARCHAR(50),
    Provincia VARCHAR(50),
    Latitudine DECIMAL(9,6),
    Longitudine DECIMAL(9,6),
    CAP VARCHAR(10)
) ENGINE=InnoDB;

-- Seconda tabella con informazioni sul CAP
CREATE TABLE CAP (
    CAP VARCHAR(10) PRIMARY KEY
) ENGINE=InnoDB;

-- Aggiungiamo la chiave esterna nella tabella Citta
ALTER TABLE Citta
ADD FOREIGN KEY (CAP) REFERENCES CAP(CAP);



http://127.0.0.1/api/api.php


http://127.0.0.1/api/api.php?cap=70010


http://127.0.0.1/api/api.php?citta=roma

