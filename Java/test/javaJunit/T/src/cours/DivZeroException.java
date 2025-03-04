package cours;

public class DivZeroException extends Exception {
	private static final long serialVersionUID = 1L;
	// serialVersionUID est utilisé pour assurer la compatibilité lors de la sérialisation/désérialisation
    // Si cette classe est modifiée (ajout de champs, méthodes...), la valeur reste constante
    // ce qui évite une exception InvalidClassException si l'objet sérialisé est lu par une version modifiée de la classe.

	@Override
	public String toString() {
		return "Division par zéro impossible!  " ;
	}

}
