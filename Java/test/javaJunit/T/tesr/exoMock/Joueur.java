package exoMock;

public class Joueur {

	private String nom;
	private Mystere nombreMystere;
	
	public Joueur(String nom) {
		this.nom=nom;
	}
	
	public void initialiserJeu(int valMax) {
		this.nombreMystere = new Mystere(valMax);
	}
	
	public void setNombreMystere(Mystere m) {
		nombreMystere = m;
	}
	
	public String jouer(int prop) {
		int res = this.nombreMystere.testProp(prop);
		String msg = "PlusPetit";
		if(res==1) {
			msg="gagne";
		}else if(res==2) {
			msg="PlusGrand";
		}
		return msg;
	}
}
