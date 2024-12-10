package entites;

public abstract class Entite{
	//Attributes
	private double pdv;
	private int pa;
	private int pd;
	private String name;
	private boolean hostility;
	//Constructors
	public Entite(String name, double pdv, int pa, int pd, boolean hostile){
		this.name = name;
		this.pdv = pdv;
		this.pa = pa;
		this.pd = pd;
		this.hostility = hostile;
	}
	
	public Entite() {
	}
	
	public double getPdv() {
		return pdv;
	}
	public void setPdv(double pdv) {
		this.pdv = pdv;
	}
	public int getPa() {
		return pa;
	}
	public void setPa(int pa) {
		this.pa = pa;
	}
	public int getPd() {
		return pd;
	}
	public void setPd(int pd) {
		this.pd = pd;
	}
	public String getNAME() {
		return NAME;
	}
	
	
}
