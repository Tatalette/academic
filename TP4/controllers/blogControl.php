<?php

require 'models/modelConnect.php';

// affichage de toutes les randonnées
function randoIndex() {
	$randos = getRando();
	require 'views/randosView.php';
}

//Affichage d'une randonnée suite à un clic
function randoShow() {
	$id = intval($_GET['id']);
	if (isset($_GET['id'])) {
		$id = intval($_GET['id']); //Intval pour forcer la mise en entier
		$rando = getRandoNum($id);
		$partis = getPartiByRando($id);
		require 'views/randoView.php';
  }
}

//Affichage des membres
function membresIndex() {
	$membres = getMembres();
	require 'views/membresView.php';
}

//Affichage d'un membre suite à un clic

function membreShow() {
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$membres = getMembrePseudo($id);
		$partis = getPartiByPseudo($id);
		require 'views/membreView.php';
  }
}

//Affichage menu
function menuShow(){
    require 'views/menuView.php';
}

//Liste des fonctions de modifications

// S'affiche un peu comme un gestionnaire pour les modifs
function modificationShow(){
	$randos = getRando(); //Aides pour la liste déroulante d'ajout
	$membres = getMembres();
	require 'views/modificationView.php';
}

//Liste des ajouts
function ajoutRando(){
    if(isset($_POST["titre"])){
        //formulaire ajout a été rempli dans la vue ajoutView.php
        $titre=$_POST['titre'];
        $date=$_POST['date'];
        $res = addRandonnee($titre,$date);
        if($res==1){
            echo "<script> window.alert('Randonnée ajoutée'); </script> ";
            echo "<script> window.location.assign('index.php')</script> "; 
            menuShow();
        }
        else{
            echo "<script> window.alert('Erreur ajout'); </script> ";
            require 'views/modificationView.php';
       }
    }
    else {
        //1er appel d'ajout
        require 'views/modificationView.php';//On reste dans la page index.php
    }
}

function ajoutMembre(){
    if(isset($_POST["pseudo"])){
        //formulaire ajout a été rempli dans la vue ajoutView.php
        $pseudo=$_POST['pseudo'];
        $age=intval($_POST['date']);
		$genre=$_POST['genre'];
        $res = addMembre($pseudo,$age,$genre);
        if($res==1){
            echo "<script> window.alert('Un nouveau membre !'); </script> ";
            echo "<script> window.location.assign('index.php')</script> "; 
            menuShow();
        }
        else{
            echo "<script> window.alert('Erreur ajout'); </script> ";
            require 'views/modificationView.php';
       }
    }
    else {
        //1er appel d'ajout
        require 'views/modificationView.php';//On reste dans la page index.php
    }
}

function ajoutParti(){
    if(isset($_POST["numRandoBis"])){
        //formulaire ajout a été rempli dans la vue ajoutView.php
        $numRando=intval($_POST['numRandoBis']);
        $pseudo=$_POST['pseudoBis'];
        $res = addParti($numRando,$pseudo);
        if($res==1){
            echo "<script> window.alert('Participation ajoutée'); </script> ";
            echo "<script> window.location.assign('index.php')</script> "; 
            menuShow();
        }
        else{
            echo "<script> window.alert('Erreur ajout'); </script> ";
            require 'views/modificationView.php';
       }
    }
    else {
        //1er appel d'ajout
        require 'views/modificationView.php';//On reste dans la page index.php
    }
}

//Liste suppression
function suppRando(){
    if(isset($_POST["numRando"])){
        //formulaire suppression a été rempli dans la vue suppresView.php
        $numRando=intval($_POST['numRando']);
        $res = delRando($numRando);
        if($res){
			echo "<script> window.alert('Suppression réussie !'); </script>";
            menuShow();
        }
        else{
            echo "<script> window.alert('Erreur suppression'); </script> ";
            require 'views/modificationView.php';
     
       }
    }
    else {
         require 'views/modificationView.php';//On reste dans la page index.php
      }
}

function suppMembre(){
    if(isset($_POST["pseudo"])){
        //formulaire suppression a été rempli dans la vue suppresView.php
        $id=$_POST['pseudo'];
        $res = delMembre($id);
        if($res=1){
			echo "<script> window.alert('Suppression réussie !'); </script>";
            menuShow();
        }
        else{
            echo "<script> window.alert('Erreur suppression'); </script> ";
            require 'views/modificationView.php';
     
       }
    }
    else {
         require 'views/modificationView.php';//On reste dans la page index.php
      }
}

function suppParti(){
    if(isset($_POST["numRandoBis"])){
        //formulaire suppression a été rempli dans la vue suppresView.php
		$numRando=intval($_POST['numRandoBis']);
        $pseudo=$_POST['pseudoBis'];
        $res = delParti($numRando,$pseudo);
        if($res=1){
			echo "<script> window.alert('Suppression réussie !'); </script>";
            menuShow();
        }
        else{
            echo "<script> window.alert('Erreur suppression'); </script> ";
            require 'views/modificationView.php';
     
       }
    }
    else {
         require 'views/modificationView.php';//On reste dans la page index.php
      }
}
//AFFICHAGE ET RECHERCHE

/*Je n'avais pas envie de créer 36k pages donc
j'ai fait en sortes de tout mettre sur la même page*/
function affichageRecherche(){
	require 'views/rechercheView.php';
}

function rechercheTitre(){
    if(isset($_POST["titre"])){
        //formulaire recherche a été rempli dans la vue rechercheView.php
        $titre=$_POST['titre'];
        $randos = getRandoTitreBis($titre);
        if($randos){
            require 'views/randosView.php';
        }
        else{
            echo "<script> window.alert('Erreur recherche'); </script> ";
            require 'views/rechercheView.php';
       }
    }
    else {
         require 'views/rechercheView.php';//On reste dans la page index.php
    }
}

function rechercheMembre(){
    if(isset($_POST["pseudo"])){
        //formulaire recherche a été rempli dans la vue rechercheView.php
        $pseudo=$_POST['pseudo'];
        $membres = getMembrePseudoBis($pseudo);
        if($membres){
            require 'views/membresView.php';
        }
        else{
            echo "<script> window.alert('Erreur recherche'); </script> ";
            require 'views/rechercheView.php';
       }
    }
    else {
         require 'views/rechercheView.php';//On reste dans la page index.php
    }
}



?>