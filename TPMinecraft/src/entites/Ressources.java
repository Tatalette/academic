package entites;

public class Ressources {
	private String nom;
	private boolean consommable;
	
	Ressources(String nom, boolean cons){
		this.nom = nom;
		this.consommable = cons;
	}

	public String getNom() {
		return nom;
	}

	public void setNom(String nom) {
		this.nom = nom;
	}

	public boolean isConsommable() {
		return consommable;
	}

	public void setConsommable(boolean consommable) {
		this.consommable = consommable;
	}
}
