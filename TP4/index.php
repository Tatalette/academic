<?php

ini_set('error_reporting', E_ALL) ; 
ini_set('display_errors', 1);

require 'controllers/blogControl.php';

// On associe la page par défaut à la page produits
function home() {
    randoIndex();
}

// Permet d'afficher une erreur
function error($code, $msg) {
  if ($code == 404) {
    http_response_code(404);
    require 'views/404.php';
  } else {
    http_response_code(500);
    require 'views/500.php';
  }
  die();
}

try {
    if (isset($_GET['action'])) {       
        $action=$_GET['action'];       
        switch($action){    
            case 'randonnees' :{  //  GET /index.php?action=randonnees
                randoIndex();
                break;
            }
            case 'randonnee' : {
                if (isset($_GET['id'])) {  //  GET /index.php?action=randonnee&id=X
                    randoShow();
                } else {  //  GET /index.php?action=randonnee
                    error(404, "/index.php?action=randonnee");
                }
                break;
            }
			case 'membres' :{  //  GET /index.php?action=membres
                membresIndex();
                break;
            }
            case 'membre' : {
                if (isset($_GET['id'])) {  //  GET /index.php?action=membre&id=X
                    membreShow();
                } else {  //  GET /index.php?action=membres
                    error(404, "/index.php?action=membres");
                }
                break;
            }			
            case 'menu' : {
                menuShow();
                break;
            }
			case 'recherche': { //Affichage page recherche
                affichageRecherche();
                break;
            }
			case 'rechercheTitre': { //Affichage résultat randonnee
                rechercheTitre();
                break;
            }
            case 'rechercheMembre': { //Affichage résultat membres
                rechercheMembre();
                break;
            }
			//Début de la modification
			case 'modificationShow':{
				modificationShow();
				break;
			}
			//Les suppressions
            case 'suppRando': {
                suppRando();
                break;
            }
			case 'suppMembre': {
                suppMembre();
                break;
            }
			case 'suppParti': {
                suppParti();
                break;
            }
			//Les ajouts
			case 'ajoutRando':  {
                ajoutRando();
                break;
            }
			case 'ajoutMembre':  {
                ajoutMembre();
                break;
            }
			case 'ajoutParti':  {
                ajoutParti();
                break;
            }
           default: {
                throw new Exception("Action non valide");
            }
        }
    } else {  // GET /index.php
        //1er appel d'index sans action
        menuShow();
    }
} catch (Exception $e) {
    error(500, $e->getMessage());
}

?>
