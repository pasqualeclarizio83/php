<!DOCTYPE html>
<html>
<head>
    <title><?php echo $data['pageTitle']; ?></title>
</head>
<body>
    <h1>Pagina Contatti</h1>
    <form action="?route=contact&submit" method="post">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="message">Messaggio:</label>
        <textarea id="message" name="message" required></textarea>
        <br>
        <input type="submit" value="Invia">
    </form>
</body>
</html>