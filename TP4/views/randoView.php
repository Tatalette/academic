<?php $title = 'Détail de la randonnée - ' . $rando['titre'].
	'<br>'.'<a id="petit" href="index.php?action=randonnees">Retour à la liste des randonnées</a>'; ?>

<?php ob_start() ?>
<article id="liens">
    <header>
        <h2>
          <?php echo $rando['titre'] . ' | départ le : ' . $rando['dateDep']; ?><br>
        </h2>
    </header>
	<h3> Les participants : </h3>
	<?php foreach ($partis as $parti): ?>
		<p>
			<?php echo '<li>'.$parti['pseudo'].'</li>';?>
		</p>
	<?php endforeach ?>
</article>
<hr />
<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>
