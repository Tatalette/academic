package exoMock;

import static org.junit.jupiter.api.Assertions.*;
import org.junit.Before;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.DisplayName;
import org.junit.jupiter.api.RepeatedTest;
import org.mockito.Mockito;

class JoueurTest {

	private Joueur joueur;
	private Mystere nbMystere;
	
	@BeforeEach
	
	void setUp() {
		nbMystere=Mockito.mock(Mystere.class);
	}
	@DisplayName("Test mystere with lesser number")
	public void testLessNumber() {
		Mockito.when(nbMystere.testProp(1)).thenReturn(0);
		assertEquals("PlusPetit",joueur.jouer(1));
	}
	
	@DisplayName("Test mystere with lesser number")
	public void testWinNumber() {
		Mockito.when(nbMystere.testProp(3)).thenReturn(1);
		assertEquals("Gagne",joueur.jouer(3));
	}
	
	@DisplayName("test mystere with higher number")
	public void testHighNumber() {
		Mockito.when(nbMystere.testProp(5)).thenReturn(2);
		assertEquals("PlusGrand",joueur.jouer(5));
	}
	
	
	
	
	
	
	
	
	
	@Test
	void test() {
		fail("Not yet implemented");
	}

}
