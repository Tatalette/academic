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
    <?php require "model/read_msg.php"; ?>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <div>
        <h1>Hello</h1>
    </div>
    <div class="deux">
        <h2 class="intro">Post</h2>
        <form action="model/post_action.php" method="POST">
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
                <div>
                    <p><strong><?= htmlspecialchars($message['nom_user']); ?> à écrit :</strong></p>
                    <p><?= htmlspecialchars($message['txt_msg']); ?></p>
                    <p><strong>Le </strong> <?= htmlspecialchars(string: $message['date_msg']); ?></p>
                    <?php if($message['user_msg']==$_SESSION['id_user']):?>
                        <button type="button" class="w-full py-2 bg-blue-500 text-white rounded hover:bg-blue-600"onclick="showEditForm(<?= $message['id_msg']; ?>)">
                            modifier
                        </button>
                        <script>
                            function showEditForm(id) {
                                const form = document.getElementById(`edit-form-${id}`);
                                if (form.style.display === 'none') {
                                    form.style.display = 'block';
                                } else {
                                    form.style.display = 'none';
                                }
                            }
                        </script>
                        <div id="edit-form-<?= $message['id_msg']; ?>" style="display: none; margin-top: 10px;">
                            <form action="model/modif_action.php" method="POST">
                                <input type="hidden" name="id_msg" value="<?= $message['id_msg']; ?>">
                                    <textarea name="new_message" rows="3" style="width: 100%;"><?= htmlspecialchars($message['txt_msg']); ?></textarea>
                                <button type="submit" class="w-full py-2 bg-green-500 text-white rounded hover:bg-green-600">Enregistrer</button>
                            </form>
                        </div>
                        <div>
                            <form action="model/delete_action.php" method="POST">
                                <input type="hidden" name="id_msg" value="<?= $message['id_msg']; ?>">
                                <button type="submit"> supprimer </button>
                            </form>
                        </div>
                    <?php endif; ?>
                </d>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun message disponible.</p>
        <?php endif; ?>
    </div>
    <div>
        <a href="model/logout.php">Se déconnecter</a>
    </div>
</body>
</html>