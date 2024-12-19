<?php
    session_start();
    include "connection.php";
    var_dump($_POST);
    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST)){
        $commentaire = htmlspecialchars(trim($_POST['commentaire']));
        try {
            
            // Requête SQL avec des paramètres nommés
            $sql = "INSERT INTO msg_table(user_msg, txt_msg, date_msg) VALUES (:id_user, :txt_msg, :date_msg)";
            // Préparation de la requête
            $stmt = $pdo->prepare($sql);
            // Données à insérer
            $data = [
                ':id_user' => $_SESSION['id_user'],
                ':txt_msg' => $commentaire,
                ':date_msg' => date('Y-m-d'),
            ];
            var_dump($data);
            // Exécution de la requête préparée
            $stmt->execute($data);
            //echo "Utilisateur ajouté avec succès !";
            // Redirige vers index.php
            header("Location: form.php");
        } catch (PDOException $e) {
            die("Erreur lors de l'insertion : " . $e->getMessage());
        }
    }  
?>