<?php $title = 'Nos randonneurs' ; ?>

<?php ob_start() ?>
<?php foreach ($membres as $membre): ?>
    <article id="liens">
        <a href="index.php?action=membre&id=<?= $membre['pseudo']; ?>">
            <h2>
              <?php echo $membre['pseudo'] . ' | âge : ' . $membre['age'].
			  ' | genre : '.$membre['genre']; ?>
            </h2>
        </a>
    </article>
    <hr/>
<?php endforeach ?>
<p id="note"><b> Note : M=Masculin; F=Féminin; B="Binaire"; NB="Non-Binaire"; NE="Ne souhaite pas s'en exprimer"</b></p>
<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>
