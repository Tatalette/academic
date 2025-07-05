<?php $title="Connexion"; ?>
<?php ob_start(); ?>

<div id='admin'>
	<!-- Connexion -->
	<form method="post" action="index.php?action=login">
		<label>Login: </label><br>
		<input type="text" name="login"><BR>
		<label>Mot de passe : </label><br>
		<input type="password" name="password"><BR>
		<input type="submit" name="submit" value="Valider">
	</form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require_once('layout.php'); ?>