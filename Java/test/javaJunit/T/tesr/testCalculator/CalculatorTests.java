package tests;

import static org.junit.jupiter.api.Assertions.assertEquals;

import org.junit.jupiter.api.DisplayName;
import org.junit.jupiter.api.Test;


class CalculatorTests {

	   private final Calculator calculator = new Calculator();

	    @DisplayName("Test add")
	    @Test
	    void testAdd() {
	        assertEquals(2, calculator.add(1, 1));
	    }
	    @DisplayName("Test prod 10x2")
	    @Test
	    void testSuccesProd() {
	        assertEquals(20, calculator.prod(10, 2));
	    }

	    @DisplayName("Test prod 10x0")
	    @Test
	    void testZeroProd() {
	        assertEquals(0, calculator.prod(10, 0));
	    }
	
}
