package testCalculator;

import static org.junit.jupiter.api.Assertions.*;

import org.junit.jupiter.api.DisplayName;
import org.junit.jupiter.api.Test;

import cours.Calculator;

class TestCalculator {

	private final Calculator calculator = new Calculator();

    @DisplayName("Test add")
    @Test
    void testAdd() {
        assertEquals(2, calculator.add(1, 1));
    }
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
    
    @DisplayName("Test prod 0x3000")
    @Test
    void testXzero() {
        assertEquals(0, calculator.prod(0, 3000));
    }
    @DisplayName("Test orid 20/10")
    @Test
    void testDiv() {
    	assertEquals(2, calculator.div(20,10));
    }

}
