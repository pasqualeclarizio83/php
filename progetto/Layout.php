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
