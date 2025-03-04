package cours;



	public class Calculator {
		public int add(int a, int b) {
			return a + b;
		}
		public int div(int x, int y) { 
			return x / y;
		}
		public int prod(int x, int y) {
	         boolean zero = false;
	         if (x == 0)
	            zero = true;
	         if (y == 0)
	            zero = true;
	         if (zero)
	            return 0;
	         else
	        	return x * y; 
	   }
}
