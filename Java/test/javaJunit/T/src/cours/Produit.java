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
        return id;
    }

    public void setId(int id) {
    	if (id < 0) {
            throw new IllegalArgumentException("L'ID ou la quantité ne peut pas être négatif");
        }
        this.id = id;
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public int getQuantite() {
        return quantite;
    }

    public void setQuantite(int quantite) {
        this.quantite += quantite;
    }
}

