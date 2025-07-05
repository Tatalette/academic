<?php

$dsn = 'mysql:host=localhost;dbname=randonnee';
$user= 'root';
$password = "";

// On utilise le try catch pour éviter les failles de sécurité

try {
	$cnx = new PDO($dsn,$user,$password);
}
catch(PDOException $e)
	{
		echo 'Une erreur est survenue :(';
}

?>