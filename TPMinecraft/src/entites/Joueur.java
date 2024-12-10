package entites;

public class Joueur extends Entite{
	private int hunger;
	
	public Joueur(String name){
		super(name,20.0,1,0,false);
		this.hunger = 20;
	}

	public int getHunger() {
		return hunger;
	}

	public void setHunger(int hunger) {
		this.hunger = hunger;
	}
	
	
}
