<?php
require 'connect/bd.php';

//Initialisation de connection à la base de donnée

function getDatabase() {
    static $db = null;
	$dsn= 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
    // Vérifie si la connexion à la base de données est déjà établie
    if ($db === null) {
        try {
            // Création de l'objet PDO et assignation à la variable statique
            $db = new PDO($dsn, DB_USER, DB_PWD);
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

// FONCTIONS COMPTES (add, get, delete)

function addCompte($nom,$prenom,$email,$password){
	$db=getDatabase();
	$compte = $db -> prepare ('INSERT INTO compte_utilisateurs(`nom`, `prenom`, `email`, `password`) VALUES (?,?,?,?)');
	$compte -> bindValue(1,$nom,PDO::PARAM_STR);
	$compte -> bindValue(2,$prenom,PDO::PARAM_STR);
	$compte -> bindValue(3,$email);
	$compte -> bindValue(4,$password);
	$compte -> execute();
	$db=NULL;
	return $res=1;
}

function getComptes(){
	$db=getDatabase();
	$comptes = $db-> prepare('SELECT DISTINCT id, nom, prenom, email, password FROM compte_utilisateurs ORDER BY id ASC');
	$comptes -> execute();
	$list = $comptes ->fetchAll(PDO::FETCH_ASSOC);
	$db=NULL;
	return $list;
}

function delCompte($id){
	$db = getDatabase();
    $query = $db->prepare('DELETE FROM compte_utilisateurs WHERE id=?');
    $query->execute(array($id));
	return $res=1;
}

// FONCTIONS LOGIN

function login($login){
	$db=getDatabase();
	$connexion = $db -> prepare('SELECT id, nom, prenom, email, password FROM compte_utilisateurs WHERE email=?');
	$connexion -> bindValue(1,$login);
	$connexion -> execute();
	$user = $connexion -> fetch(PDO::FETCH_ASSOC);
	$db=NULL;
	return $user;
}

function verification($login,$password){
	$db=getDatabase();
	$verification = $db -> prepare('SELECT DISTINCT password FROM compte_utilisateurs WHERE email=?');
	$verification -> bindValue(1,$login);
	$verification -> execute();
	$password_hash = password_hash($password,PASSWORD_DEFAULT);
	$user = $verification -> fetch(PDO::FETCH_ASSOC);
	if(password_verify($user['password'],$password_hash)){
		$db = NULL;
		return true;
	}
	else{
		$db = NULL;
		return false;
	}
}

// FONCTIONS PRODUITS

function getCategories(){
	$db=getDatabase();
	$cat = $db-> prepare('SELECT DISTINCT id, nom FROM categories ORDER BY id ASC');
	$cat -> execute();
	$list = $cat ->fetchAll(PDO::FETCH_ASSOC);
	$db=NULL;
	return $list;
}

function getProduits(){
	$db=getDatabase();
	$prod = $db-> prepare('SELECT DISTINCT id, nom, description, quantité FROM produits ORDER BY id ASC');
	$prod -> execute();
	$list = $prod ->fetchAll(PDO::FETCH_ASSOC);
	$db=NULL;
	return $list;
}

function getProduitsByCat($cat){
	$db=getDatabase();
	$query = ('SELECT DISTINCT produits.id, nom, description, quantité 
		FROM produits 
		LEFT JOIN produits_categorie_liaison
		ON produits.id = produits_categorie_liaison.id_produit
        WHERE produits_categorie_liaison.id_categorie = ?');
	$prodByCat = $db -> prepare($query);
	$prodByCat -> bindValue(1,$cat);
    $prodByCat -> execute();
	$resultat = $prodByCat -> fetchAll(PDO::FETCH_ASSOC);
	$db = NULL;
	return $resultat ;
}

function getProduitById($id){
	$db=getDatabase();
	$prodById = $db -> prepare('SELECT DISTINCT id, nom, description, quantité FROM produits WHERE id = ?');
	$prodById -> bindValue(1,$id);
	$prodById -> execute();
	$resultat = $prodById -> fetch(PDO::FETCH_ASSOC);
	$db= NULL;
	return $resultat;
}

function getProduitByNom($id){
	$db=getDatabase();
	$prodById = $db -> prepare('SELECT DISTINCT id, nom, description, quantité FROM produits WHERE nom = ?');
	$prodById -> bindValue(1,$id);
	$prodById -> execute();
	$resultat = $prodById -> fetch(PDO::FETCH_ASSOC);
	$db= NULL;
	return $resultat;
}

function getCategorieByProd($id){
	$db=getDatabase();
	$query = ('SELECT DISTINCT categories.id,nom
		FROM categories 
		LEFT JOIN produits_categorie_liaison
		ON categories.id = produits_categorie_liaison.id_categorie
        WHERE produits_categorie_liaison.id_produit = ?');
	$prodByCat = $db -> prepare($query);
	$prodByCat -> bindValue(1,$id);
    $prodByCat -> execute();
	$resultat = $prodByCat -> fetch(PDO::FETCH_ASSOC);
	$db = NULL;
	return $resultat ;
}

function getCategorieById($id){
	$db=getDatabase();
	$query = ('SELECT DISTINCT id, nom
		FROM categories 
        WHERE id = ?');
	$prodByCat = $db -> prepare($query);
	$prodByCat -> bindValue(1,$id);
    $prodByCat -> execute();
	$resultat = $prodByCat -> fetch(PDO::FETCH_ASSOC);
	$db = NULL;
	return $resultat ;
}

//Modification PRODUITS
function addProduit($nom,$description,$quantite){
	$db=getDatabase();
	$compte = $db -> prepare ('INSERT INTO produits(`nom`, `description`, `quantité`, `password`) VALUES (?,?,?);');
	$compte -> bindValue(1,$nom);
	$compte -> bindValue(2,$description);
	$compte -> bindValue(3,$quantite);
	$compte -> execute();
	$db=NULL;
	return $res=1;
}
function addLiaison($id,$categorie){
	$db=getDatabase();
	$compte = $db -> prepare ('INSERT INTO `produits_categorie_liaison`(`id_produit`, `id_categorie`) VALUES (?,?))');
	$compte -> bindValue(1,$id);
	$compte -> bindValue(2,$categorie);
	$compte -> execute();
	$db=NULL;
	return $res=1;
}

function delProduit($id){
	$db = getDatabase();
    $query = $db->prepare('DELETE FROM produits_categorie_liaison WHERE id_produit=?;
							DELETE FROM produits WHERE id= ?;');
    $query->execute(array($id));
	return $res=1;
}

function modProduit($id,$nom,$description,$quantite){
	$db=getDatabase();
	$compte = $db -> prepare ('UPDATE `produits` SET `nom`=?,`description`=?,`quantité`=? WHERE id=?');
	$compte -> bindValue(1,$nom);
	$compte -> bindValue(2,$description);
	$compte -> bindValue(3,$quantite);
	$compte -> bindValue(4,$id);
	$compte -> execute();
	$db=NULL;
	return $res=1;
}
function modLiaison($id,$categorie){
	$db=getDatabase();
	$compte = $db -> prepare ('UPDATE `produits_categorie_liaison` SET `id`=?,`id_produit`=?,`id_categorie`=? WHERE id_prod=?');
	$compte -> bindValue(1,$id);
	$compte -> bindValue(2,$categorie);
	$compte -> bindValue(2,$id);
	$compte -> execute();
	$db=NULL;
	return $res=1;
}
?>
