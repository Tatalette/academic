package cours;

import org.junit.Before;
import org.junit.Test;
import org.mockito.Mockito;

import static org.mockito.ArgumentMatchers.anyInt;
import static org.mockito.Mockito.*;
import static org.junit.Assert.*;

public class InventaireTest {

	private Inventaire inventaire;

    @Before
    public void setUp() {
        inventaire = new Inventaire();
    }

    @Test
    public void testAjouterEtVerifierProduit() {
        Produit produit = new Produit(1,"produit1",10);
 
        inventaire.ajouterProduit(produit);
        assertEquals("La quantité doit être 10 après l'ajout", 10, inventaire.verifierQuantite(1));
    }

    @Test
    public void testAjouterProduitsMultiples() {
        Produit produit1 = new Produit(1,"produit1",10);
        Produit produit2 = new Produit(2,"produit2",15);

        inventaire.ajouterProduit(produit1);
        inventaire.ajouterProduit(produit2);

        assertEquals("La quantité du produit 1 doit être 10", 10, inventaire.verifierQuantite(1));
        assertEquals("La quantité du produit 2 doit être 15", 15, inventaire.verifierQuantite(2));
    }

    @Test
    public void testSuppressionProduit() {
        Produit produit1 = new Produit(1,"produit1",10);

        inventaire.ajouterProduit(produit1);
        assertTrue("Le produit doit être supprimé avec succès", inventaire.supprimerProduit(1));
        assertFalse("Le produit ne doit plus etre présent", inventaire.estPresentProduit(1));
    }

    @Test
    public void testAjouterProduitExistant() {
        Produit produit1 = new Produit(1,"produit1",10);
        Produit produit2 = new Produit(1,"produit1",20);         
          // Ajout du produit pour la première fois
        inventaire.ajouterProduit(produit1);
        
        // Ajout du même produit pour la deuxième fois
        inventaire.ajouterProduit(produit2);
        
        // Vérifie que la quantité totale du produit est la somme des quantités ajoutées
        assertEquals("La quantité totale du produit doit être la somme des quantités des deux produits ajoutés", 30, inventaire.verifierQuantite(1));

    }
}
