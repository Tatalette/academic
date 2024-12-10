package entites;
import java.util.Random;

public class JetDe {
	private static Random rd = new Random();
	private int dice;
	
	public static int jetEvenement(){
		return rd.nextInt(10);
	}
	
	public static int jetApparition() {
		return rd.nextInt(100);
	}
	
	public static int jetCombat() {
		return rd.nextInt(2);
	}
	
	public static int jetCreeper() {
		return rd.nextInt(90);
	}

	public static int jetList(int size) {
		return rd.nextInt(size);
	}
}
