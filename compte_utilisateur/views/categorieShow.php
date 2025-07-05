<?php $title = 'Nos Produits' ; ?>

<?php ob_start(); ?>

<div id='fond'>
<table>
	<tr>
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
</div>
<?php $content = ob_get_clean(); ?>
<?php require_once 'layout.php'; ?>