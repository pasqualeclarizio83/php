<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
   <style>
	body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #3498db;
    text-align: center;
    margin-bottom: 20px;
}

p {
    font-size: 16px;
    margin-bottom: 20px;
}

ul {
    list-style: none;
    display: flex;
    justify-content: center;
}

li {
    margin: 0 15px;
}

a {
    text-decoration: none;
    color: #3498db;
    transition: color 0.3s ease;
}

a:hover {
    color: #2980b9;
}

/* Styling for forms */
form {
    display: flex;
    flex-direction: column;
}

input[type="text"],
input[type="password"],
input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #3498db;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #2980b9;
}

/* Responsive styles */
@media (max-width: 768px) {
    body {
        padding: 20px;
    }
    
    .container {
        max-width: 100%;
    }
}
   </style>
</head>
<body>

    <h1>Benvenuto nella pagina principale</h1>

    <p>Seleziona un'azione:</p>

    <ul>
        <li><a href="register.html">Registrazione</a></li>
        <li><a href="login.html">Login</a></li>
    </ul>

</body>
</html>