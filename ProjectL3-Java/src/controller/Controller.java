package controller;

import view.IHM;
import model.*;
import view.ResultPanel;

import java.util.ArrayList;

public class Controller {
    private final IHM ihm;
    private final Search search;

    public Controller(IHM ihm) {
        this.ihm = ihm;
        this.search = new Search();
    }

    @Deprecated
    public ArrayList<ArrayList<Object>> rechercheCMD(String str) {
        ArrayList<ArrayList<Object>> res = search.SimpleSearch(str);
        if (res.isEmpty())
            return null;
        return res;
    }


    public ResultPanel[] recherche(String str) {
        ArrayList<ArrayList<Object>> res = search.SimpleSearch(str);
        ResultPanel resPanel[] = new ResultPanel[res.size()];
        for (int i = 0; i < res.size(); i++) {
            resPanel[i] = new ResultPanel(res.get(i).get(1).toString(), null, Integer.parseInt(res.get(i).get(0).toString()));
        }
        return null;
    }
}
