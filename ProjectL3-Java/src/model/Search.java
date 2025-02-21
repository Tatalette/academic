package model;

import java.util.ArrayList;

public class Search {
    private DBConnector conn;

    public Search() {
        this.conn = new DBConnector("3306", "127.0.0.1", "root");
        try {
            conn.connect("root", "ProjectDB");
        } catch (Exception e) {
            System.out.println(e.getMessage());
        }

    }

    public ArrayList<ArrayList<Object>> SimpleSearch(String str) {
        String where = "nom_recette LIKE '"+str+"%'";
//        String where = "nom_recette CONTAINS '"+str+"'";
        try {
            return  conn.select("Recette", "*", where);

        } catch (Exception e) {
            System.out.println(e.getMessage());
        }
        return null;
    }
}
