<?php $title="suppression d'un compte"; ?>
<?php ob_start(); ?>
<?php logProtection(); ?>

<div id='admin'>
	<!-- delete -->
	<form method="post" action="index.php?action=supprimer">
        <label for="choix">Choix de suppression :</label><br>
        <select type="text" name="id">
            <?php foreach ($list as $compte): ?>
                <option value="<?= $compte['id'] ?>"><?= $compte['id']." ; ".$compte['nom']." ; ".$compte['prenom'] ?></option>
            <?php endforeach; ?>
        </select>
	<input type="submit" value="Valider">
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require_once('layout_admin.php'); ?>