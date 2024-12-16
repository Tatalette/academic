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
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <div>
        <h1>Hello</h1>
    </div>
    <div class="deux" method="POST">
        <h2 class="intro">Post</h2>
        <form action="form.php">
            <div>
                <label>new message:</label>
            <div>
            <input type="text" id="commentaire" name="commentaire">
            <div>
                <button type="submit">Valider</button>
            </div>
        </form>
    </div>
    <div class="deux">
        <h3 class="deux">Read</h3>
    </div>
    <div>
        <a href="index.php?action=logout">Se déconnecter</a>
    </div>
</body>
</html>