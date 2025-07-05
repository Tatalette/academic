<?php $title = 'Détail du membre - ' . $membres['pseudo'].
	'<br>'.'<a id="petit" href="index.php?action=membres">Retour à la liste des membres</a>'; ?>

<?php ob_start() ?>
<article id="liens">
    <header>
        <h2>
          <?php echo 'Age : '.$membres['age'] . ' | genre : ' . $membres['genre']; ?>
        </h2>
    </header>
	<h3> Ces inscriptions : </h3>
	<?php foreach ($partis as $parti): ?>
		<p>
			<?php echo '<li>'.$parti['titre'].'départ le : '.$parti['dateDep'].'</li>';?>
		</p>
	<?php endforeach ?>
</article>
<hr />
<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>
