<?php
    include "connection.php";
    session_start();
    if (isset($_SESSION["id_user"]) && isset($_POST["id_msg"])) {
        $id_msg = intval($_POST["id_msg"]); 

        try {
            $sql = "DELETE FROM msg_table WHERE id_msg = :id_msg AND user_msg = :user_msg"; 
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':id_msg' => $id_msg,
                ':user_msg' => $_SESSION['id_user'] 
            ]);
            header("Location: ../form.php");
            exit();
        } catch (PDOException $e) {
            die("Erreur lors de la suppression du message : " . $e->getMessage());
        }
    } else {
        die("Requête invalide.");
    }
?>
