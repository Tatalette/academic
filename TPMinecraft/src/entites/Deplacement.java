package entites;

import java.util.ArrayList;

public class Deplacement {
	private static int x;
	private static int y;
	
	public static void moving(int moving) {
		if(moving==6) {
			x += 1;
		}
		if(moving==4) {
			x -= 1;
		}
		if(moving==8) {
			y += 1;
		}
		if(moving==2) {
			y -= 1;
		}
		else {
			System.out.print("Mauvaise instruction, recommencez");
		}
	}
	
	public static void localisation() {
		System.out.println("Votre position actuelle : ["+x+","+y+"]");
	}
	
}
