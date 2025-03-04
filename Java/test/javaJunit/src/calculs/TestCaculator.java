package calculs;

public class TestCaculator {

	public static void main(String[] args) {

		CalculatorOperation op=new Addition(2,3);
		Calculator calc=new Calculator();
		calc.calculate(op);
		System.out.println(op.getResult());

	}

}
