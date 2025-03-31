package cours;

public class Produit {
    private int id;
    private String nom;
    private int quantite;

    public Produit(int id, String nom, int quantite) {
        if (id < 0 || quantite < 0) {
            throw new IllegalArgumentException("L'ID ou la quantité ne peut pas être négatif");
        }
        this.id = id;
        this.nom = nom;
        this.quantite = quantite;
    }
    
    public int getId() {
        return this.id;
    }

    public void setId(int id) {
    	if (id < 0) {
            throw new IllegalArgumentException("L'ID ou la quantité ne peut pas être négatif");
        }else {
        this.id = id;
        }
    }

    public String getNom() {
        return this.nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public int getQuantite() {
        return this.quantite;
    }

    public void setQuantite(int quantite) {
        if((this.quantite+=quantite)<0) {
        	throw new IllegalArgumentException("La quantité ne peut pas être négatif");
        }else {
    	this.quantite += quantite;
        }
    }
}

