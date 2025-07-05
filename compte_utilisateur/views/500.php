<?php $title = 'Compte - ' . "Erreur interne (500)"; ?>

<?php ob_start() ?>
<h1>Erreur interne (500)</h1>
<p>Oups. Une erreur est survenue : <?= $msg ?></p>
<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>
