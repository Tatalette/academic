<?php $title="Supression d'un produit"; ?>
<?php ob_start(); ?>
<?php logProtection(); ?>

<div id='admin'>
	<!-- delete -->
	<form method="post" action="index.php?action=supprimerProd">
        <label for="choix">Choix de suppression :</label><br>
        <select type="text" name="id">
            <?php foreach ($list as $produit): ?>
                <option value="<?= $produit['id'] ?>"><?= $produit['id']." ; ".$produit['nom'] ?></option>
            <?php endforeach; ?>
        </select>
	<input type="submit" value="Valider">
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require_once('layout_admin.php'); ?>