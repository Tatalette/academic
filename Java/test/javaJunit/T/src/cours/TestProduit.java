package cours;

import static org.junit.Assert.assertThrows;
import static org.junit.jupiter.api.Assertions.*;

import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

class TestProduit {
    
    private Produit produit;
    
    @BeforeEach
    void setUp() {
        produit = new Produit(1, "Produit", 10);
    }
    
    @Test
    void testIllegalArgIdNegatif() {
    	assertThrows(IllegalArgumentException.class,() -> produit.setId(-10));
    }
    
    @Test
    void testIllegalArgQteNegatif() {
        assertThrows(IllegalArgumentException.class, () -> produit.setQuantite(-20));
    }
    
    @Test
    void testQuantite() {
        produit.setQuantite(5);
        assertEquals(15, produit.getQuantite());
        produit.setQuantite(-10);
        assertEquals(5, produit.getQuantite());
    }
    
    @Test
    void testId() {
    	produit.setId(2);
    	assertEquals(2, produit.getId());
    }
}

