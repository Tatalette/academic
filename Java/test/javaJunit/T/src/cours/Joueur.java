package cours;

public class Joueur {
	
	  private String nom;
	  private Mystere nombreMystere;
      
	    public Joueur(String nom){
	    	this.nom=nom;
	     }    
	    public void initialiserJeu(int valeurMax) {
	    	this.nombreMystere=new Mystere(valeurMax);
	    }
	    public void setNombreMystere(Mystere nombreMystere) {
	    	this.nombreMystere =nombreMystere;
	    }

	    public String jouer(int prop) {
	    	int res=this.nombreMystere.testProp(prop);
	    	String msg="PlusPetit";
	    	if (res==1) {
	    		msg="Gagne";
	    	}
	    	else if (res==2) {
	    			msg="PlusGrand";
	    	     }
	    	return msg;
	    }
	}
