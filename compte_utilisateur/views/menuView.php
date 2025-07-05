<html lang="fr">
    <head>
        <title>Menu Principal</title>
        <meta charset="utf-8">
		<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
		<META HTTP-EQUIV="Expires" CONTENT="-1">
		<link rel="stylesheet" type="text/css" href="public/style.css" />
    </head>
    <body>
	<header>
	<div>
	<?php session_start(); ?>
	<?php 
		if(empty($_SESSION["user"])){?>
			<a href="index.php?action=login">Se connecter</a>
		<?php
		}else{?>
		<a href="index.php?action=logout">Se déconnecter</a>
		<?php } 
	?>
	<?php
		if(empty($_SESSION["user"])){
			$admin=False;
		}else{
		$admin=True;
		} ?>
	</div>
	</header>
    <h1> LA QUALITE ET LE BIEN ETRE </h1>
	<p id='Menu'><b>MENU</b></p>
    <nav>
		<ul>
			<li>
				<a href="index.php?action=produits"> Nos produits </a>
			</li>
			<li id="deroulant">
				<a href="#"> catégories </a>
				<ul id="sous">
					<?php foreach ($categories as $categorie): ?>
						<?php echo "<li>"."<a href='index.php?action=categorie&id=".$categorie['id']."'>".$categorie['nom']."</a>"."</li>"; ?>
					<?php endforeach; ?>
				</ul>
			</li>
			<?php if($admin==True){ ?>
			<li id="deroulant">
				<a href="#"> administration </a>
				<ul id="sous">
					<li><a href="index.php?action=comptes">Liste des comptes</a></li>
					<li><a href="index.php?action=supprimer">Supprimer utilisateur</a></li>
					<li><a href="index.php?action=ajouter">Ajouter utilisateur</a></li>
					<li><a href="index.php?action=ajouterProd">Ajouter produit</a></li>
					<li><a href="index.php?action=supprimerProd">Supprimer produit</a></li>
					<li><a href="index.php?action=modifierProd">Modifier produit</a></li>
				</ul>
			</li>
			<?php }; ?>
		</ul>
	</nav>
	</body>
</html>