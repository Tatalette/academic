<?php $title = $produit['nom'] ; ?>

<?php ob_start() ?>
<div>
	<a href="index.php?action=categorie&id=<?= $categorie['id'];?>"> Retour aux produits </a>
</div>
<div id='admin'>
	<p> Description du produit : </p>
	<table>
	<tr>
		<th> nom du produit </th>
		<th> <?php echo $produit['nom']; ?> </th>
	</tr>
	<tr>
		<td> catégorie </td>
		<td> <?php echo $categorie['nom']; ?> </td>
	</tr>
	<tr>
		<td> description du produit </td>
		<td> <?php echo $produit['description']; ?> </td>
	</tr>
	<tr>
		<td> quantité disponible </td>
		<td> <?php echo $produit['quantité']; ?> </td>
	</tr>
	</table>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>