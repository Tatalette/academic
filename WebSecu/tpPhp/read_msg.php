<?php
    include "connection.php";
    try {
        $sql = "SELECT user_msg, txt_msg, date_msg FROM msg_table";

        $stmt = $pdo->prepare($sql);

        $stmt->execute();

        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erreur lors de la récupération des messages : " . $e->getMessage());
    }
?>