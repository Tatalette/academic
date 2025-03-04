package cours;

public class Calculs {

	public static int calculsX(int x){
		if (x < 0) 
			x = -x;
		else 
			x -= 1;
		if (x == 2) 
			x = 1;
		else 
			x += 2;
		return x;
		}

	
}
