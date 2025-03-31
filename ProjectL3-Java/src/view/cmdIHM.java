package view;

import controller.Controller;

import java.util.Objects;
import java.util.Scanner;

public class cmdIHM implements IHM {


    public cmdIHM() {
        Controller ctrl = new  Controller(this);
        Scanner scan = new Scanner(System.in);
        String c;
        boolean flag = true;
        clearBis();
        afficheTitre();
        while (flag) {

            System.out.println("Rechercher un titre de recette\t\t\t\t\t\tPress 'Q' to exit");
            c = scan.nextLine();

            if (c.equals("Q")) {
                flag = false;
                return;
            }

            System.out.println(ctrl.rechercheCMD(c));

        }
    }

    public void afficheTitre() {
        System.out.println("Livres de recette");
    }

    public void clear() {
        try {
            if (System.getProperty("os.name").contains("Windows"))
                Runtime.getRuntime().exec("cls");
            else
                Runtime.getRuntime().exec("clear");

        } catch (Exception e) {
            System.err.println(e.getMessage());
        }
    }

    public void afficherRecette() {};

    public void clearBis() {
        for (int i = 0; i < 25; i++)
            System.out.println("\n");
    }
}
