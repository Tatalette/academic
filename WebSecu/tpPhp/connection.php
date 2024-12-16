<?php
// Paramètres de connexion à la base de données
$host = 'localhost'; // Adresse du serveur MySQL
$dbName = 'td_php'; // Nom de la base de données
$username = 'root'; // Nom d'utilisateur MySQL
$password = ''; // Mot de passe MySQL

try {
    // Créer une instance de PDO pour se connecter à la base de données
    $dsn = "mysql:host=$host;dbname=$dbName;charset=utf8";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Activer les exceptions pour les erreurs SQL
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Mode de récupération par défaut
        PDO::ATTR_EMULATE_PREPARES => false, // Désactiver l'émulation des requêtes préparées
    ];

    $pdo = new PDO($dsn, $username, $password, $options);

    //echo "Connexion réussie à la base de données.";
} catch (PDOException $e) {
    // Gérer les erreurs de connexion
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

?>
