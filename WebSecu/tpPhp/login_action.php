<?php
    include "connection.php";
    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST)){
        $email = htmlspecialchars(trim($_POST['email']));
        $password = htmlspecialchars(trim($_POST['password']));
        try {
            $sql = "SELECT nom_user,prenom_user,pwd_user FROM user_table WHERE email_user = :email";
            // Préparer la requête
            $stmt = $pdo->prepare($sql);
        
            // Exécuter la requête avec le paramètre
            $stmt->execute([':email' => $email]);

            // Récupérer les résultats
            $user = $stmt->fetch();
            if ($user) {
                // Comparaison du mot de passe avec le hachage
                if (password_verify($password, $user['pwd_user'])) {
                    session_start();
                    header("Location: form.php");
                } else {
                    header("Location: form.php");
                }
            } else {
                echo "Aucun utilisateur trouvé avec cet email.";
            }
        } catch (PDOException $e) {
            die("Erreur lors de la recherche : " . $e->getMessage());
        }
    }  
?>