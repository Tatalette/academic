package cours;

import java.util.HashMap;
import java.util.Map;

public class Inventaire {
    private Map<Integer, Produit> produits;

    public Inventaire() {
        this.produits = new HashMap<>();
    }

    public void ajouterProduit(Produit produit) {
        if (produits.containsKey(produit.getId())) {
        	//si le produit id est déjà dans la liste, sa quantité doit etre augmentée
            Produit existant = produits.get(produit.getId());
            existant.setQuantite(existant.getQuantite() + produit.getQuantite());
        } else {
            produits.put(produit.getId(), produit);
        }
    }

    public boolean supprimerProduit(int id) {
        if (produits.containsKey(id)) {
            produits.remove(id);
            return true;
        }
        return false;
    }

    public int verifierQuantite(int id) {
        if (produits.containsKey(id)) {
            return produits.get(id).getQuantite();
        }
        return -1;
    }
    public boolean estPresentProduit(int id) {
        return(produits.containsKey(id)) ;
    }
}

