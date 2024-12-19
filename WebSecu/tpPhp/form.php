<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <!--  Pour forcer le vidage du cache du navigateur -->
	<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="-1">
    <?php session_start(); ?>
    <?php require "read_msg.php"; ?>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <div>
        <h1>Hello</h1>
    </div>
    <div class="deux">
        <h2 class="intro">Post</h2>
        <form action="post_action.php" method="POST">
            <div>
                <label>new message:</label>
            <div>
            <input type="text" id="commentaire" name="commentaire">
            <div>
                <button type="submit">Valider</button>
            </div>
        </form>
    </div>
    <div class="deux" name="message">
        <h3 class="deux">Read</h3>
        <?php if (!empty($messages)): ?>
            <?php foreach ($messages as $message): ?>
                <div class="message">
                    <p><strong>Utilisateur ID :</strong> <?= htmlspecialchars($message['user_msg']); ?></p>
                    <p><strong>Message :</strong> <?= htmlspecialchars($message['txt_msg']); ?></p>
                    <p><strong>Date :</strong> <?= htmlspecialchars($message['date_msg']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun message disponible.</p>
        <?php endif; ?>
    </div>
    <div>
        <a href="logout.php">Se déconnecter</a>
    </div>
</body>
</html>