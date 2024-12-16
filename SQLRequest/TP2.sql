1.
SELECT DISTINCT * 
FROM Station 
WHERE Region = "Antilles";

2.
SELECT NomStation, Region 
FROM Station;

3.
SELECT Region
FROM Station;

4.
SELECT NomStation
FROM Station
WHERE Region ='Antilles' AND Capacite > 200;

5.
SELECT NomStation
FROM Station
WHERE Region ='Antilles' OR Capacite > 200;

6.
SELECT NomStation
FROM Station
WHERE Region <> 'Antilles' AND Capacite >200;

7.
SELECT NomStation
FROM Station
WHERE Region ='Antilles';

8.
SELECT DISTINCT NomStation 
FROM Activite
WHERE Libelle ='plongée';

9.
SELECT id, Nom, Prenom
FROM Client
WHERE Region ='Europe';

10.
SELECT Client.id, Client.Nom
FROM Client
JOIN Sejour ON Sejour.idClient = Client.id
WHERE Debut >= '2019-01-01' AND Debut <= '2019-12-31';

11.
SELECT Station.NomStation, Station.Region
FROM Station
JOIN Activite ON Station.NomStation = Activite.NomStation
WHERE Activite.Libelle = 'voile';

12.
SELECT Client.id, Client.Nom
FROM Client
JOIN Sejour ON Client.id = Sejour.idClient
WHERE Sejour.NomStation ='Santalba'

13.
SELECT DISTINCT Station.Region
FROM Sejour
JOIN Station ON Sejour.NomStation = Station.NomStation
WHERE Sejour.idClient ='30'

14.
SELECT Client.id, Client.Nom
FROM Client
JOIN Sejour ON Client.id = Sejour.idClient
JOIN Activite ON Sejour.NomStation = Activite.NomStation
WHERE Activite.Libelle = 'plongée'

15.
SELECT DISTINCT Client.Region
FROM Client
LEFT JOIN Sejour ON Sejour.idClient = Client.id
JOIN Station ON Sejour.NomStation = Station.NomStation
WHERE Station.Region IS NULL;

16.
SELECT DISTINCT NomStation
FROM Sejour
JOIN Client ON Sejour.idClient = Client.id
WHERE Client.Region <>'Amérique';

17.
SELECT DISTINCT NomStation
FROM Activite
WHERE NomStation NOT IN(
    SELECT DISTINCT NomStation
    FROM Activite
    WHERE Prix <= 100;
);