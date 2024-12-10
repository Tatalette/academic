package entites;

import java.util.ArrayList;
import java.util.Scanner;
import java.util.HashMap;
import java.util.Map;

public class ManipGame {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		//Monster: Name, pdv, pa
		boolean play = true;
		
		//Creation monstre/drop
		Monster creeper = new Monster("creeper",20,49);
		Monster zombie = new Monster("zombie",20,1);
		Monster squelette = new Monster("squelette",20,2);
		Monster spider = new Monster("spider",30,2);
		
		Ressources flesh = new Ressources("Flesh",true);
		Ressources os = new Ressources("Os",false);
		Ressources poudre = new Ressources("poudre",false);
		Ressources soie = new Ressources ("soie",false);
		
		//Creation ressources
		Ressources bois = new Ressources("bois",false);
		Ressources ble = new Ressources("blé",false);
		Ressources fer = new Ressources("fer",false);
		Ressources potion = new Ressources("potion de soin",true);
				
		ArrayList<Ressources> listR = new ArrayList<>();
		listR.add(flesh);
		listR.add(os);
		listR.add(poudre);
		listR.add(soie);
		listR.add(bois);
		listR.add(ble);
		listR.add(fer);
		listR.add(potion);
		
		//Pour futur implémentation, non utilisé
		/*
		Map<Monster,Ressources> dictMonster = new HashMap();
		dictMonster.put(squelette, os);
		dictMonster.put(zombie, flesh);
		dictMonster.put(creeper, poudre);
		dictMonster.put(spider, soie);
		*/
		
		//Creation Equipement
		Equipement epeeBois = new Equipement("epee en bois",4,0);
		Equipement epeeFer = new Equipement("epee en fer",9,0);
		Equipement casqueFer = new Equipement("casque en fer",1,0);
		Equipement armureFer = new Equipement("armure en fer",3,0);
		
		ArrayList<Equipement> listEquip = new ArrayList<>();
		
		//Debut du jeu
		
		try ( Scanner scanner = new Scanner( System.in ) ) {
			System.out.print("Saisissez votre pseudo : ");
			String pseudo = scanner.next();
			Joueur p1 = new Joueur(pseudo);
			//Generation attributs du jeu
			int choiceMove=-1;
			int dice=-1;
			boolean combat;
			//Dé d'apparition
			int diceApp;
			//Dé combat
			int diceC;
			Monster monsterC = new Monster();
			Ressources drop;
			Ressources objetManip;
			String answer;
			
			while(play==true) {
				//Réinitialisation de valeurs
				choiceMove=-1;
				dice=-1;
				//Player Information
				Deplacement.localisation();
				System.out.print("Votre faim :"+p1.getHunger()+"\nVos points de vie :"+p1.getPdv());
				//Action
				System.out.print("Saisissez votre action : (tapez le chiffre correspondant)");
				System.out.print("\n1. Se déplacer");
				System.out.print("\n2. Ouvrir l'inventaire");
				int choice = scanner.nextInt();
				if(choice==1) {
					//Deplacement
					while(choiceMove!=8||choiceMove!=6||choiceMove!=2||choiceMove!=4) {
						System.out.print("Saisissez '8' for north, '6' for east, '4' for south, '2' for west");
						choiceMove = scanner.nextInt();
						Deplacement.moving(choiceMove);
					}
				}else {
					//Inventaire
					Inventory.afficherInventaire();
					System.out.print("1. Jeter objet \n2. Crafter \n. Consommer \n3. Retour");
					if(choice==1) {
							System.out.print("Saisissez le nom de l'objet à jeter");
							answer = scanner.next();
							for(int i=0; i<listR.size();i++) {
								if(listR.get(i).getNom()==answer) {
									objetManip=listR.get(i);
								}
							}
							Inventory.retirer(objetManip);
					}else if(choice==2) {
					
					}else {
						
					}
				}//Fin manip inventaire
				//Lancement evenement aleatoire
				dice=JetDe.jetEvenement();
				if(dice>=8) {//Combat!!
					//Jet de l'apparition
					diceApp = JetDe.jetApparition();
					if(diceApp<=30) {
						monsterC = zombie;
						drop = flesh;
					} else if(diceApp<=60) {
						monsterC = squelette;
						drop = os;
					} else if(diceApp<=80) {
						monsterC = creeper;
						drop = poudre;
					} else {
						monsterC = spider;
						drop = soie;
					}
					combat=true;
					while(combat==true) {
						monsterC.setPdv(monsterC.getPdv()-p1.getPa());
						if(monsterC.getPdv()<=0) {
							combat=false;
							Inventory.ajouter(drop);
							System.out.println("vous avez gagné !");
						}
						diceC = JetDe.jetCombat();
						if(monsterC!=creeper) {
							if(diceC!=2) {
								if(monsterC.getPa()-p1.getPd()<=0) {
									p1.setPdv(p1.getPdv()-0.5);
								}else {
									p1.setPdv(monsterC.getPa()-p1.getPd());
								}
								if(p1.getPdv()<=0) {
									combat=false;
									play=false;
									System.out.println("vous êtes mort !");
								}
							}
						}else {
							diceC = JetDe.jetCreeper();
							if(diceC<20) {
								System.out.println("Vous suez des gouttes, rien ne se passe");
							}
							if(diceC<=75) {
								System.out.println("Le creeper à explosé, vous vous prenez de la terre dans les yeux");
								p1.setPdv(p1.getPdv()-5);
								monsterC.setPdv(0);
							}
							if(diceC<=85) {
								System.out.println("L'explosion du creeper à brisé votre âme");
								p1.setPdv(p1.getPdv()-10);
								monsterC.setPdv(0);
							}else {
								System.out.println("Le câlin n'est pas une bonne idée");
								p1.setPdv(p1.getPa()-monsterC.getPa());
								monsterC.setPdv(0);
							}
						}
					}
					//Sortie du combat autre evenement
				}else{//Sortie du combat
					diceApp=JetDe.jetApparition();
					if(diceApp<=70) {
						drop =
					}
				}
	        }
		}
			
	}

}
