<?php $title="Modifications"; ?>
<?php ob_start(); ?>
<!-- Modification randonnée -->
<p id="modification"> modification randonnée </p>
<div id="mod">
	<!-- delete -->
	<form method="post" action="index.php?action=suppRando">
		<label>Numéro de la randonnée à supprimer : </label><br>
		<input type="text" name="numRando">
		<input type="submit" name="btnSupprimer" value="Supprimer">
	</form>
	<!-- Ajout -->
	<form method="post" action="index.php?action=ajoutRando">
		<label>Titre : </label><br>
		<input type="text" name="titre"><BR>
		<label>Date : </label><br>
		<input type="text" name="date"><BR>
		<input type="submit" name="btnAjout" value="Ajouter">
	</form>
</div>
<br>
<!-- Modification membres -->
<p id="modification"> modification membre </p>
<div id="mod">
	<!-- delete -->
	<form method="post" action="index.php?action=suppMembre">
		<label>Pseudo du membre  : </label><BR>
		<input type="text" name="pseudo"><br>
		<input type="submit" name="btnSupprimer" value="Supprimer">
	</form>
	<!-- Ajout -->
	<form method="post" action="index.php?action=ajoutMembre">
		<label>Pseudo : </label><BR>
		<input type="text" name="pseudo"><BR>
		<label>Age : </label><BR>
		<input type="text" name="date"><BR>
		<label>Genre(M,F,B,NB,NE)*voir note: </label><br>
		<input type="text" name="genre"><BR>
		<input type="submit" name="btnAjout" value="Ajouter">
	</form>
</div>
<p id="note"><b> Note : M=Masculin; F=Féminin; B="Binaire"; NB="Non-Binaire"; NE="Ne souhaite pas s'en exprimer"</b></p>
<br>
<!-- Modification participation -->
<p id="modification"> modification participation </p>
<div id="mod">
	<!-- delete -->
	<form method="post" action="index.php?action=suppParti">
        <label for="choix">Suppression d'une participation (randonnée,pseudo):</label><br>
        <select type="text" name="numRandoBis">
            <?php foreach ($randos as $rando): ?>
                <option value="<?= $rando['numRando'] ?>"><?= $rando['titre'] ?></option>
            <?php endforeach; ?>
        </select>
		<select type="text" name="pseudoBis">
            <?php foreach ($membres as $membre): ?>
                <option value="<?= $membre['pseudo'] ?>"><?= $membre['pseudo'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Valider">
    </form>
	<!-- Ajout -->
	<form method="post" action="index.php?action=ajoutParti">
        <label for="choix">Ajout d'une participation (randonnée,pseudo):</label><br>
        <select type="text" name="numRandoBis">
            <?php foreach ($randos as $rando): ?>
                <option value="<?= $rando['numRando'] ?>"><?= $rando['titre'] ?></option>
            <?php endforeach; ?>
        </select>
		<select type="text" name="pseudoBis">
            <?php foreach ($membres as $membre): ?>
                <option value="<?= $membre['pseudo'] ?>"><?= $membre['pseudo'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Valider">
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require_once('layout.php'); ?>