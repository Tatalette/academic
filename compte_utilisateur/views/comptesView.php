<?php $title = 'Liste des comptes' ; ?>
<?php ob_start() ?>
<?php logProtection(); ?>

<div id='admin'>
<table>
	<tr>
		<th> id </th>
		<th> nom </th>
		<th> prenom </th>
		<th> email </th>
		<th> mot de passe </th>
	</tr>
	<?php foreach ($list as $compte): ?>
		<?php echo "<tr>
			<td>".$compte['id']."</td>
			<td>".$compte['nom']."</td>
			<td>".$compte['prenom']."</td>
			<td>".$compte['email']."</td>
			<td>".$compte['password']."</td>
			</tr>" ?>
	<?php endforeach ?>
</table>
<div id='admin'>
<?php $content = ob_get_clean(); ?>
<?php require 'layout_admin.php'; ?>