package entites;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

public class Inventory {
	
	private static ArrayList<Ressources> inventaire = new ArrayList<>(32);
	private Ressources ress;
	private static Map<Integer,Equipement> equipement = new HashMap(5);
	
	public static void retirer(Ressources nom) {
		if(inventaire.contains(nom)==false) {
			System.out.println("L'objet ne fait pas parti de l'inventaire !");
		}else {	
		inventaire.remove(nom);
		}
	}
	
	public static void ajouter(Ressources nom) {
		if(inventaire.size()<=32) {
			System.out.println("Impossible, inventaire plein");
		}else {
			inventaire.add(nom);
		}
	}
	
	public static void afficherInventaire() {
		System.out.print("Contenu de l'inventaire :\n");
		for(int i=0; i<=inventaire.size();i++) {
			System.out.println(i+" : "+inventaire.get(i));
		}
	}
	
	public static ArrayList<Ressources> afficherConsommable(){
		ArrayList<Ressources> r1 = new ArrayList<>();
		System.out.print("Contenu de l'inventaire :\n");
		for(int i=0; i<=inventaire.size();i++) {
			if(inventaire.get(i).isConsommable()==true) {
				r1.add(inventaire.get(i));
			}
		}
		return r1;
	}
	
	public static void equiper(int i, Equipement e) {
		
	}
}
