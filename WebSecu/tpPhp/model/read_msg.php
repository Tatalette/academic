<?php
    include "connection.php";
    try {
        $sql = "SELECT id_msg, user_msg, txt_msg, date_msg, nom_user FROM msg_table JOIN user_table ON msg_table.user_msg = user_table.id_user";

        $stmt = $pdo->prepare($sql);

        $stmt->execute();

        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erreur lors de la récupération des messages : " . $e->getMessage());
    }
?>