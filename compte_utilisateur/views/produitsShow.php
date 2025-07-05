<?php $title = 'Nos Produits' ; ?>

<?php ob_start(); ?>

<table id='produit'>
	<tr><th></th>
		<th> nom </th>
		<th> quantite </th>
	</tr>
	<?php foreach ($produits as $produit): ?>
		<?php echo "<tr>".
			"<td>"."<a href='index.php?action=produit&id=".$produit['id']."'>".$produit['nom']."</a>"."</td>".
			"<td id='quantite'>".$produit['quantité']."</td>
			</tr>"; ?>
	<?php endforeach ?>
</table>

<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>

