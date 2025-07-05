<?php $title = 'Nos randonnees ' ; ?>

<?php ob_start() ?>
<?php foreach ($randos as $rando): ?>
    <article id="liens">
        <a href="index.php?action=randonnee&id=<?= $rando['numRando']; ?>">
            <h2>
              <?php echo $rando['numRando'].'. '.$rando['titre'] . 
			  ' | départ le : ' . $rando['dateDep']; ?>
            </h2>
        </a>
    </article>
    <hr />
<?php endforeach ?>
	
<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>
