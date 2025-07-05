<?php $title="Ajout d'un compte"; ?>
<?php ob_start(); ?>
<?php logProtection(); ?>

<div id='admin'>
	<!-- Connexion -->
	<form method="post" action="index.php?action=ajouter">
		<label>nom : </label><br>
		<input type="text" name="nom"><BR>
		<label>prenom : </label><br>
		<input type="text" name="prenom"><BR>
		<label>email : </label><br>
		<input type="email" name="email"><BR>
		<label>password : </label><br>
		<input type="password" name="password"><BR>
		<input type="submit" name="btnAjout" value="Ajouter">
	</form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require_once('layout_admin.php'); ?>