package calculs;

import java.security.InvalidParameterException;

public class Calculator {
    public void calculate(CalculatorOperation operation) {
        if (operation == null) {
            throw new InvalidParameterException("Can not perform operation"); }
        if (operation instanceof Addition) {
            Addition addition = (Addition) operation;
            addition.setResult(addition.getLeft() + addition.getRight());} 
        else if (operation instanceof Substraction) {
            Substraction substraction = (Substraction) operation;
            substraction.setResult(substraction.getLeft() - substraction.getRight());
        }}
}
