<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
		<!--  Pour forcer le vidage du cache du navigateur -->
		<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
		<META HTTP-EQUIV="Expires" CONTENT="-1">
		<?php echo '<link rel="stylesheet" type="text/css" href="public/style.css" />' ?>
        <title><?= $title ?></title>
		<?php session_start(); ?>
    </head>
    <body>
        <header>
			<div>
            <a href="index.php?action=menu">Retour à l'acceuil</a>
			</div>
			<div>
			<?php 
			if(empty($_SESSION["user"])){?>
				<a href="index.php?action=login">Se connecter</a>
			<?php
			}else{?>
			<a href="index.php?action=logout">Se déconnecter</a>
			<?php } ?>
			</div>
		</header>
		<h1><?= $title ?></h1></a>
        <hr/>
        <div>
            <?= $content ?>
        </div>
        <footer>
        </footer>
        <hr/>
    </body>
</html>