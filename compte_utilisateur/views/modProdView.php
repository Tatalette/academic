<?php $title="Modification d'un produit"; ?>
<?php ob_start(); ?>
<?php logProtection(); ?>

<div id='admin'>
	<!-- Connexion -->
	<form method="post" action="index.php?action=modifierProd">
		<label>id: </label><br>
		<input type="text" name="id"><BR>
		<label>nom : </label><br>
		<input type="text" name="nom"><BR>
		<label>description : </label><br>
		<input type="text" name="description"><BR>
		<label>quantité : </label><br>
		<input type="text" name="quantite"><BR>
		<label>categorie : </label><br>
		<input type="text" name="categorie"><BR>
		<input type="submit" name="btnAjout" value="Ajouter">
	</form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require_once('layout_admin.php'); ?>