package entites;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

public class Monster extends Entite{
	private double probability;
	private Ressources drop;
	private static Map<Monster, ArrayList> dictMonster = new HashMap();

	public Monster(String Name, int pdv, int degats) {
		super(Name,20.0,49,0,true);
	}
	
	public Monster() {
		super();
	}
}
