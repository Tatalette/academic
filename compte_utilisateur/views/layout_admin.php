<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
		<!--  Pour forcer le vidage du cache du navigateur -->
		<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
		<META HTTP-EQUIV="Expires" CONTENT="-1">
		<?php echo '<link rel="stylesheet" type="text/css" href="public/style.css" />' ?>
        <title><?= $title ?></title>
    </head>
    <body>
        <header>
		<div>
            <a href="index.php?action=menu">Retour à l'acceuil</a>
		</div>
		<div>
			<a href="index.php?action=logout">Se déconnecter</a>
		</div>
        </header>
        <hr/>
		<h1><?= $title ?></h1></a>
        <div>
            <?= $content ?>
        </div>
        <footer>
        </footer>
        <hr/>
    </body>
</html>