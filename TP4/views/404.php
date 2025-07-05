<?php $title = 'Rando Party - ' . "Erreur 404"; ?>

<?php ob_start() ?>
<h1>Erreur 404</h1>
<p>'<?= $msg ?>' n'existe pas !.</p>
<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>
