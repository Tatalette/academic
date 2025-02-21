package controller;

import view.IHM;
import model.*;

import java.util.ArrayList;

public class Controller {
    private IHM ihm;
    private Search search;

    public Controller(IHM ihm) {
        this.ihm = ihm;
        this.search = new Search();
    }

    public String recherche(String str) {
        ArrayList<ArrayList<Object>> res = search.SimpleSearch(str);
        StringBuilder strb = new StringBuilder();
        if (res.isEmpty())
            return "Aucune recette trouvé :/\n";
        for (int i = 0; i < res.size(); i++) {
            strb.append(i+1).append("): ").append(res.get(i).get(3)).append("\n");
        }
        return strb.toString();
    }
}
