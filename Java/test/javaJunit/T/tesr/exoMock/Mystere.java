package exoMock;
import java.util.Random;

public class Mystere {

	private int valeur;
	private int valeurMax;
	
	public Mystere(int valeurMax) {}
	public int getValeurMax() {return this.valeurMax;}
	public int getValeur() {return this.valeur;}
	public void setValeur(int valeur) {}
	public void generer() {
		Random rand = new Random();
		this.setValeur(rand.nextInt(this.valeurMax));
	}
	public int testProp(int prop) {
		int res = 0;
		if(prop==this.valeur) {
			res = 1;
		}else if(prop > prop) {
			res = 2;
		}
		return res;
	}
}
