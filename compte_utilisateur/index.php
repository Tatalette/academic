<?php

ini_set('error_reporting', E_ALL) ; 
ini_set('display_errors', 1);

require 'controllers/compteControl.php';


function home() {
    compteIndex();
}

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
            case 'comptes' :{
                compteIndex();
                break;
            }
            case 'ajouter' : {
                compteAjout();
                break;
            }
			case 'supprimer' :{
                compteSupp();
                break;
            }			
            case 'menu' : {
                menuShow();
                break;
            }
			case 'login':{
				loginShow();
				break;
			}
			case 'logout':{
				logout();
				break;
			}
			case 'produits':{
				produitsShow();
				break;
			}
			case 'produit' : {
                if (isset($_GET['id'])) {
                    produitShow();
                } else {
                    error(404);
                }
                break;
            }
			case 'categorie':{
				if(isset($_GET['id'])) {
					categorieShow();
				} else {
					error(404);
				}
				break;
			}
			case 'supprimerProd':{
				produitSupp();
				break;
			}
			case 'ajouterProd':{
				produitAjout();
				break;
			}
           default: {
                throw new Exception("Action non valide");
            }
			case 'modifierProd':{
				produitModifier();
				break;
			}
        }
    } else {
        menuShow();
    }
} catch (Exception $e) {
    error(500, $e->getMessage());
}

?>