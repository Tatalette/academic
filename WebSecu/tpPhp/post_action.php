<?php
    include "connection.php";
    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST)){
        $commentaire = htmlspecialchars(trim($_POST['commentaire']));
        try {
            // Requête SQL avec des paramètres nommés
            $sql = "INSERT INTO user_table (nom_user, prenom_user, email_user, pwd_user) VALUES (:nom, :prenom, :email, :mot_de_passe)";
            
            // Préparation de la requête
            $stmt = $pdo->prepare($sql);
        
            // Données à insérer
            $data = [
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':email' => $email,
                ':mot_de_passe' => password_hash($password, PASSWORD_BCRYPT),
            ];
        
            // Exécution de la requête préparée
            $stmt->execute($data);
        
            //echo "Utilisateur ajouté avec succès !";
            // Redirige vers index.php
            header("Location: index.php");
        } catch (PDOException $e) {
            die("Erreur lors de l'insertion : " . $e->getMessage());
        }
    }  
?>