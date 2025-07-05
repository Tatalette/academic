<?php $title="Recherches"; ?>
<?php ob_start(); ?>

<form method="post" action="index.php?action=rechercheTitre">
            <label>Titre randonnée : </label>
            <input type="text" name="titre">
            <input type="submit" name="btnRecherche" value="Rechercher">
</form>
<br>
<form method="post" action="index.php?action=rechercheMembre">
            <label>Pseudo membre : </label>
            <input type="text" name="pseudo">
            <input type="submit" name="btnRecherche" value="Rechercher">
</form>

<?php $content = ob_get_clean(); ?>
<?php require_once('layout.php'); ?>