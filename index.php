<?php
require 'config.php';

$stmt = $pdo->query("SELECT * FROM notes ORDER BY created_at DESC");
$notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoteBox</title>
</head>

<body>
    <h1>Mes notes</h1>
    <a href="create.php">➕ Nouvelle note</a>
    <ul>
        <?php foreach ($notes as $note): ?>
            <li>
                <strong><?= htmlspecialchars($note['title']); ?></strong>
                (<?= $note['created_at']; ?>)
                <a href="edit.php?id=<?= $note['id']; ?>">✏️ Modifier</a>
                <a href="delete.php?id=<?= $note['id']; ?>">🗑 Supprimer</a>
                <p><?= nl2br(htmlspecialchars($note['content'])); ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>