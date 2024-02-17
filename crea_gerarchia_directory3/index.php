<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione Directory</title>
<style>

body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        ul {
            list-style-type: none;
            padding-left: 20px;
        }

        li {
            margin-bottom: 5px;
        }

        form.delete-form {
            display: inline-block;
            margin-left: 10px;
        }

        .error {
            color: red;
        }


</style>
</head>
<body>

<h2>Crea una nuova Directory</h2>
<form action="crea_directory.php" method="post">
    <label for="nome">Nome Directory:</label>
    <input type="text" id="nome" name="nome" required>
    <select name="parent_directory_id" id="parent_directory_id">
        <option value="">Nessuna Directory Madre</option> <!-- Opzione predefinita -->
        <?php
        include 'config.php';

        // Funzione ricorsiva per generare le opzioni delle directory in una gerarchia
        function generateDirectoryOptions($conn, $parent_id = null, $indent = 0) {
            $sql = "SELECT * FROM Directory WHERE parent_directory_id " . ($parent_id === null ? "IS NULL" : "= $parent_id");
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['directory_id']."'>" . str_repeat('&nbsp;&nbsp;', $indent) . $row['nome'] . "</option>";
                    generateDirectoryOptions($conn, $row['directory_id'], $indent + 1);
                }
            }
        }

        // Genera le opzioni delle directory
        generateDirectoryOptions($conn);
        ?>
    </select>
    <input type="submit" value="Crea Directory">
</form>

<h2>Directory Esistenti</h2>
<?php
// Funzione ricorsiva per visualizzare le directory e le loro sotto-directory
function displayDirectories($conn, $parent_id = null, $indent = 0) {
    $sql = "SELECT * FROM Directory WHERE parent_directory_id " . ($parent_id === null ? "IS NULL" : "= $parent_id");
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>" . str_repeat('&nbsp;&nbsp;', $indent) . $row['nome'] . " <form action='elimina_directory.php' method='post'><input type='hidden' name='directory_id' value='" . $row['directory_id'] . "'><input type='submit' value='Elimina'></form></li>";
            displayDirectories($conn, $row['directory_id'], $indent + 1);
        }
        echo "</ul>";
    }
}

// Visualizza la struttura gerarchica delle directory
displayDirectories($conn);
?>

</body>
</html>







