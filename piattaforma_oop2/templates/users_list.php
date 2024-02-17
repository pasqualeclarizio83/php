<h2>Lista degli Utenti</h2>
<ul>
    <?php foreach ($users as $user): ?>
        <li><?= $user['username']; ?></li>
    <?php endforeach; ?>
</ul>
