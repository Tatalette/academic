package model;

import java.sql.*;
import java.util.ArrayList;
import java.util.Arrays;

public class DBConnector {
    private final String CLASSNAME = "DBConnector";
    private final String port;
    private final String ipAddress;
    private final String user;
    private Connection conn;

    /**
     *
     * @param port The SQL port
     * @param ipAddress The IP address of the SQL server
     * @param user The name of the user
     * if the SQL server is local, the IP address will be either "localhost" or "127.0.01"
     * the SQL port is usually 3306
     */
    public DBConnector(String port, String ipAddress, String user) {
        this.port = port;
        this.ipAddress = ipAddress;
        this.user = user;
    }

    /**
     * main method to use the DBConnector class
     * also connect the SQL log to the LogFiler class
     * @param pass Password of the user
     * @param db The database name
     * @throws SQLException If any problems happen, SQLException will be thrown
     *
     */
    public void connect(String pass, String db) throws SQLException{
        try {
            String url = "jdbc:mysql://" + ipAddress + ":" + port + "/" + db;
            this.conn = DriverManager.getConnection(url, user, pass);
            if (this.conn == null) {
                throw new SQLException("DBConnector.connect(): NullConnector");
            }
        } catch (Exception e) {
            throw new SQLException("DBConnector.connect(): "+ e.getMessage());
        }
    }

    private ResultSet dbQuery(String QUERY) throws SQLException {
        try {
//            System.out.println(QUERY);
            Statement stmt = conn.createStatement();
            //log("Query Accepted", "dbQuery");
            return stmt.executeQuery(QUERY);
        }
        catch (Exception e) {
            throw new SQLException("SQL Error in DBConnector.dbQuery(): "+ e.getMessage());
        }
    }

    private void dbQueryNoReturn(String QUERY) throws SQLException {
        try {
            Statement stmt = conn.createStatement();
            stmt.execute(QUERY);
        }
        catch (Exception e) {
            throw new SQLException("SQL Error in DBConnector.dbQueryNoReturn(): "+ e.getMessage());
        }
    }

    /**
     * select  column in a specified table
     * @param TABLE Name of the table
     * @param TARGET Name of the columns targeted
     * @param WHERE Where clause of the query, initialised at 1=1
     * @param LIMIT Limit clause, initialised at 10
     * @return Returns an arrayList of rows
     */
    public ArrayList<ArrayList<Object>> select(String TABLE, String TARGET, String WHERE, String LIMIT) throws SQLException{
        try {
            ArrayList<ArrayList<Object>> result = new ArrayList<>();
            ResultSet res = dbQuery("SELECT "+TARGET+" FROM "+TABLE+" WHERE "+WHERE+" LIMIT "+LIMIT);
            ArrayList<Integer> types = getColumnTypes(TABLE);
            ArrayList<String> names = getColumnNames(TABLE);
            if (names.isEmpty() || types.isEmpty())
                return new ArrayList<>();
            while (true) {
                int j = 0;
                assert res != null;
                if (!res.next()) break;
                ArrayList<Object> row = new ArrayList<>();
                for (int t : types) {
                    switch (t) {
                        case 1 -> row.add(res.getInt(names.get(j)));
                        case 2, 4 -> row.add(res.getString(names.get(j)));
                        case 3 -> row.add(res.getDate(names.get(j)));
                        case 5 -> row.add(res.getFloat(names.get(j)));
                    }
                    j++;
                }
                result.add(row);
            }
            return result;
        } catch (Exception e) {
            throw new SQLException("SQL Error in DBConnector.select(): "+ e.getMessage());
        }
    }

    public ArrayList<ArrayList<Object>> selectAll(String TABLE) throws SQLException{
        return select(TABLE, "*", "1=1", "10");
    }

    public ArrayList<ArrayList<Object>> select(String TABLE, String TARGET, String WHERE)  throws SQLException{
        return select(TABLE, TARGET, WHERE, "10");
    }

    public ArrayList<ArrayList<Object>> select(String TABLE, String TARGET)  throws SQLException{
        return select(TABLE, TARGET, "1=1", "10");
    }

    /**
     * Insert a row into a specified table, COLNAMES and VALUES must concord
     * @param TABLE is the table name, the name correction isn't applied
     * @param COLNAMES is the names of each column affected
     * @param VALUES is the respective value
     */
    public void insert(String TABLE, String[] COLNAMES, Object[] VALUES) {

        try {
            StringBuilder query = new StringBuilder("INSERT INTO `" + TABLE + "` (");

            if (COLNAMES.length != VALUES.length)
                throw new SQLException("Number of column does not match the number of value");

            for (int i = 0; i < COLNAMES.length - 1; i++)
                query.append("`").append(COLNAMES[i]).append("`, ");
            query.append("`").append(COLNAMES[COLNAMES.length - 1]).append("`)");

            query.append(" VALUES (");

            for (int i = 0; i < VALUES.length - 1; i++)
                query.append("'").append(VALUES[i]).append("', ");
            query.append("'").append(VALUES[VALUES.length - 1]).append("')");

            PreparedStatement preparedStmt = conn.prepareStatement(query.toString());
            preparedStmt.execute();
        } catch (Exception ignored) {}
    }

    // TODO: 17/10/2024 methods that alter/delete item in table


    private ArrayList<Integer> getColumnTypes(String TABLE) throws SQLException {
        try {
            ResultSet columnTypes = dbQuery("SELECT DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '" + TABLE + "'");
            ArrayList<Integer> types = new ArrayList<>();
            while (true) {
                assert columnTypes != null;
                if (!columnTypes.next()) break;
                String type = columnTypes.getString("DATA_TYPE");
                switch (type) {
                    case "int" -> types.add(1);
                    case "varchar" -> types.add(2);
                    case "date" -> types.add(3);
                    case "text" -> types.add(4);
                    case "float" -> types.add(5);
                    default -> types.add(0);
                }
            }
            //log("TABLE = " + TABLE, "getColumnTypes");
            return types;
        } catch (Exception e) {
            return new ArrayList<>();
        }
    }

    private ArrayList<String> getColumnNames(String TABLE) {
        try {
            ResultSet columnNames = dbQuery("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '" + TABLE + "'");
            ArrayList<String> names = new ArrayList<>();
            while (true) {
                assert columnNames != null;
                if (!columnNames.next()) break;
                names.add(columnNames.getString("COLUMN_NAME"));
            }
            //log("TABLE = " + TABLE, "getColumnNames");
            return names;
        } catch (Exception e) {
            return new ArrayList<>();
        }
    }

    private ArrayList<String> getParsedColumnNames(String TABLE) throws SQLException {
        try {
            ResultSet columnNames = dbQuery("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '" + TABLE + "'");
            ArrayList<String> names = new ArrayList<>();
            while (true) {
                assert columnNames != null;
                if (!columnNames.next()) break;
                names.add((columnNames.getString("COLUMN_NAME")) //TODO: Test this
                        .replace(getTableSuffix(TABLE), "")
                        .replace("_", "")
                        .replace("-", " "));
            }
            //log("TABLE = " + TABLE, "getParsedColumnNames");
            return names;
        } catch (Exception e) {
            return new ArrayList<>();
        }
    }

    private String getTableSuffix(String TABLE) {
        return TABLE.substring(TABLE.indexOf('_') + 1);
    }

    private String getTablePrefix(String TABLE) {
        return TABLE.substring(0, TABLE.indexOf('_') + 1);
    }

    private String correctTableName(String TABLE) {
        return TABLE.replace(" ", "-").replace("_", "-").toLowerCase();
    }


    public String getPort() {
        return port;
    }

    public String getIpAddress() {
        return ipAddress;
    }

    public String getUser() {
        return user;
    }
}
