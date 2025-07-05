<?php
require 'config/db.php';

//Initialisation de connection à la base de donnée

function getDatabase() {
    static $db = null;
    $dsn = 'mysql:host=localhost;dbname=randonnee';
    $user = 'root';
    $password = '';
    // Vérifie si la connexion à la base de données est déjà établie
    if ($db === null) {
        try {
            // Création de l'objet PDO et assignation à la variable statique
            $db = new PDO($dsn, $user, $password);
            // Définir le mode d'erreur PDO pour afficher les exceptions
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            // En cas d'erreur de connexion, affichez un message d'erreur
            echo 'Erreur de connexion : ' . $e->getMessage();
            // Arrête l'exécution du script ou affichez un message d'erreur et redirigez l'utilisateur vers une page d'erreur
            exit();
        }
    }
    return $db;
}


//Pour l'utilisation de PDO::PARAM, les float et date sont utilisés respectivement en STR.

// FONCTIONS RANDONNEE

function getRando(){
	$db=getDatabase();
	$rando = $db-> prepare('SELECT DISTINCT numRando, titre, dateDep FROM randonnee ORDER BY dateDep ASC');
	$rando -> execute();
	$randos = $rando ->fetchAll(PDO::FETCH_ASSOC);
	//le db NULL pour fermer la connexion en mySQL
	$db=NULL;
	return $randos;
}

function getRandoNum($id){
    $db = getDatabase();
    $rando = $db->prepare('SELECT numRando, titre, dateDep FROM randonnee WHERE numRando = ?');
    $rando->bindValue(1, $id, PDO::PARAM_INT);
    $rando->execute();
    $randonnee = $rando->fetch(PDO::FETCH_ASSOC);
	$db=NULL;
    return $randonnee;
}


function getRandoTitre($recherche){
	$db=getDatabase();
	$randonnees = $db-> prepare('SELECT numRando, titre, dateDep FROM randonnee WHERE titre LIKE ? ORDER BY dateDep ASC');
	//Liaison du parametre, dans l'utilisation du like obligé d'utiliser cette méthode
	$rando -> bindValue(1,"%$recherche%",PDO::PARAM_STR);
	$rando -> execute();
	$randonnee = $rando ->fetch(PDO::FETCH_ASSOC);
	$db=NULL;
	return $randonnee;
}

//Création d'une fonction bis pour la recherche qui oblige l'utilisation du fetchALL
function getRandoTitreBis($recherche){
	$db=getDatabase();
	$rando = $db-> prepare('SELECT numRando, titre, dateDep FROM randonnee WHERE titre LIKE ?');
	$rando -> bindValue(1,"%$recherche%",PDO::PARAM_STR);
	$rando -> execute();
	$randonnee = $rando ->fetchAll(PDO::FETCH_ASSOC);
	$db=NULL;
	return $randonnee;
}

function addRandonnee($titre,$dateDep){
	$db=getDatabase();
	$rando = $db -> prepare ('INSERT INTO `randonnee`(`titre`, `dateDep`) VALUES (?,?)');
	//Bind des valeurs avec un paramètre qui oblige l'obligation du respect du type de variable. Pas de PARAM en date
	$rando -> bindValue(1,$titre,PDO::PARAM_STR);
	$rando -> bindValue(2,$dateDep,PDO::PARAM_STR);
	$rando -> execute();
	$db=NULL;
	return $res=1;
}

function delRando($numRando){
	$db = getDatabase();
    $query = $db->prepare('DELETE FROM `randonnee` WHERE numRando=?');
    $res = $query->execute(array($numRando));
	return $res=1;
}

// FONCTIONS MEMBRE

function getMembres(){
	$db=getDatabase();
	$membres = $db -> prepare('SELECT pseudo, age, genre FROM membre ORDER BY pseudo ASC');
	$membres -> execute();
	$membre = $membres -> fetchAll(PDO::FETCH_ASSOC);
	$db=NULL;
	return $membre;
}

function getMembrePseudo($id){
    $db = getDatabase();
    $membre = $db->prepare('SELECT pseudo, age, genre FROM membre WHERE pseudo LIKE ?');
    $membre->bindValue(1, "%$id%", PDO::PARAM_STR);
    $membre->execute();
    $membres = $membre->fetch(PDO::FETCH_ASSOC);
	$db=NULL;
    return $membres;
}

//Même chose que pour la fonction RandoTitreBis()
function getMembrePseudoBis($id){
    $db = getDatabase();
    $membre = $db->prepare('SELECT pseudo, age, genre FROM membre WHERE pseudo LIKE ?');
    $membre->bindValue(1, "%$id%", PDO::PARAM_STR);
    $membre->execute();
    $membres = $membre->fetchAll(PDO::FETCH_ASSOC);
	$db=NULL;
    return $membres;
}

function addMembre($pseudo,$age,$genre){
	$db=getDatabase();
	$membres = $db -> prepare ('INSERT INTO `membre`(`pseudo`, `age`, `genre`) VALUES (?,?,?)');
	$membres -> bindValue(1,$pseudo,PDO::PARAM_STR);
	$membres -> bindValue(2,$age, PDO::PARAM_STR);
	$membres -> bindValue(3,$genre, PDO::PARAM_STR);
	$membres -> execute();
	$db=NULL;
	return $res=1;
}

function delMembre($pseudo){
	$db=getDatabase();
	$query = $db -> prepare ('DELETE FROM membre WHERE pseudo = ?');
	$query -> execute(array($pseudo));
	$db=NULL;
	return $res=1;
}

//FONCTION PARTICIPATION

function getPartiByRando($numRando){
	$db=getDatabase();
	$parti = $db-> prepare('SELECT pseudo FROM participation WHERE numRando = ? ORDER BY pseudo ASC');
	$parti -> bindValue(1,$numRando,PDO::PARAM_INT);
	$parti -> execute();
	$partis = $parti ->fetchAll(PDO::FETCH_ASSOC);
	$db=NULL;
	return $partis;
}

function getPartiByPseudo($pseudo){
	$db=getDatabase();
	$parti = $db-> prepare('SELECT DISTINCT titre, dateDep FROM randonnee JOIN participation ON pseudo LIKE ? ');
	$parti -> bindValue(1,"%$pseudo%",PDO::PARAM_STR);
	$parti -> execute();
	$partis = $parti ->fetchAll(PDO::FETCH_ASSOC);
	$db=NULL;
	return $partis;
}

function addParti($numRando,$pseudo){
	$db=getDatabase();
	//On check si le couple de jetons existe déjà dans la base de donnée pour ne pas créer de doublons
	$check = $db->prepare('SELECT COUNT(*) FROM participation WHERE numRando = ? AND pseudo = ?');
    $check->execute([$numRando, $pseudo]);
    $count = $check->fetchColumn();
	if($count==0){
		$parti = $db -> prepare ('INSERT INTO `participation`(`numRando`, `pseudo`) VALUES (?,?)');
		$parti -> bindValue(1,$numRando,PDO::PARAM_INT);
		$parti -> bindValue(2,$pseudo, PDO::PARAM_STR);
		$parti -> execute();
		$db=NULL;
		return $res=1;
	}
	else{
		$db=NULL;
	}
}

function delParti($numRando,$pseudo){
	$db=getDatabase();
	$query = $db -> prepare ('DELETE FROM `participation` WHERE numRando = ? AND pseudo = ?');
	$query -> execute(array($numRando,$pseudo));
	$db=NULL;
	return $res=1;
}

?>