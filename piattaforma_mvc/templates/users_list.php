<h2>Lista degli Utenti</h2>
<ul>
    <?php foreach ($users as $user): ?>
        <li><a href="?endpoint=users&action=view&id=<?= $user['id']; ?>"><?= $user['username']; ?></a></li>
    <?php endforeach; ?>
</ul>
