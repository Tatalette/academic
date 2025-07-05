<?php

require 'models/modelConnect.php';

//Affichage menu
function menuShow(){
	$categories = getCategories();
    require 'views/menuView.php';
}

// --- COMPTES ---
// affichage de tous les comptes
function compteIndex() {
	$list = getComptes();
	require 'views/comptesView.php';
}

// ajout d'un compte
function compteAjout(){
    if(isset($_POST["nom"])){
        //formulaire ajout a été rempli dans la vue ajoutView.php
        $nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$email=$_POST['email'];
		$password=$_POST['password'];
        $res = addCompte($nom,$prenom,$email,$password);
        if($res==1){
            echo "<script> window.alert('compte ajouté'); </script> ";
            echo "<script> window.location.assign('index.php')</script> "; 
            menuShow();
        }
        else{
            echo "<script> window.alert('Erreur ajout'); </script> ";
            require 'views/ajoutView.php';
       }
    }
    else {
        require 'views/ajoutView.php';
    }
}

// suppression d'un compte
function compteSupp(){
	$list = getComptes();
    if(isset($_POST["id"])){
        $id=intval($_POST['id']);
        $res = delCompte($id);
        if($res=1){
			echo "<script> window.alert('Suppression réussie !'); </script>";
            menuShow();
        }
        else{
            echo "<script> window.alert('Erreur suppression'); </script> ";
            require 'views/suppView.php';
		}
    }
    else{
        require 'views/suppView.php';
    }
}


// --- MISCELLANEOUS ---
// Authentification
function loginShow(){
	require'views/loginView.php';
	if(isset($_POST['login'])&&isset($_POST['password'])){
		if($_POST['login']=="" || $_POST['password']==""){
			echo "login ou mot de passe vide !";
			require'views/loginView.php';
		}
		else{
			if($_POST['password'])
			$login = $_POST['login'];
			$password = $_POST['password'];
			$user = login($login);
			$test = verification($login,$password);
			if($test==true){
				session_start();
				$_SESSION["user"]=$user["email"];
				header('location:index.php');
			}
			else{
				echo "Login ou mot de passe éronnée !";
				require'views/loginView.php';
			}
		}
	}
}
// Deconnexion
function logout(){
	session_start();
	session_destroy();
	header('location:index.php');
}
// Protection de page
function logProtection(){
	session_start();
	if(empty($_SESSION["user"])){
		echo "<script> window.alert('Accès interdit !'); </script> ";
		header("Location: https://coursinterfaces.univ-corse.fr/CHENE_ARLETTE/compte_utilisateur/index.php?action=menu");
	}
}

// --- PRODUITS ---
// Affichage des PRODUITS

function produitsShow(){
	$produits = getProduits();
	require 'views/produitsShow.php';
}

function produitShow(){
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$produit = getProduitById($id);
		$categorie = getCategorieByProd($id);
		require 'views/produitShow.php';
	}
}

function categorieShow(){
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$produits = getProduitsByCat($id);
		require_once 'views/categorieShow.php';
	}
}

// Suppression, ajout, modification

function produitSupp(){
	$list = getProduits();
    if(isset($_POST["id"])){
        $id=intval($_POST['id']);
        $res = delProduit($id);
        if($res=1){
			echo "<script> window.alert('Suppression réussie !'); </script>";
            menuShow();
        }
        else{
            echo "<script> window.alert('Erreur suppression'); </script> ";
            require 'views/suppProdView.php';
		}
    }
    else{
        require 'views/suppProdView.php';
    }
}

function produitAjout(){
    if(isset($_POST["nom"])){
        //formulaire ajout a été rempli dans la vue ajoutView.php
        $nom=$_POST['nom'];
		$description=$_POST['description'];
		$quantite=$_POST['quantite'];
		$categorie=$_POST['categorie'];
        $res = addProduit($nom,$description,$quantite);
		$prod = getProduitByNom($nom);
		$idProd = $prod['id'];
		$liaison = addLiaison($idProd,$categorie);
        if($res==1){
            echo "<script> window.alert('compte ajouté'); </script> ";
            echo "<script> window.location.assign('index.php')</script> "; 
            menuShow();
        }
        else{
            echo "<script> window.alert('Erreur ajout'); </script> ";
            require 'views/addProdView.php';
       }
    }
    else {
        require 'views/addProdView.php';
    }
}

function produitModifier(){
    if(isset($_POST["nom"])){
        //formulaire ajout a été rempli dans la vue ajoutView.php
		$id=$_POST['id'];
        $nom=$_POST['nom'];
		$description=$_POST['description'];
		$quantite=$_POST['quantité'];
		$categorie=$_POST['catégorie'];
        $res = modProduit($nom,$description,$quantite);
		$prod = getProduitByNom($nom);
		$idProd = $prod['id'];
		$liaison = modLiaison($idProd,$categorie);
        if($res==1){
            echo "<script> window.alert('compte ajouté'); </script> ";
            echo "<script> window.location.assign('index.php')</script> "; 
            menuShow();
        }
        else{
            echo "<script> window.alert('Erreur ajout'); </script> ";
            require 'views/modProdView.php';
       }
    }
    else {
        require 'views/modProdView.php';
    }
}

?>