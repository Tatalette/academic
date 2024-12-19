<?php
    include "connection.php";
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_msg'], $_POST['new_message'])) {
        $id_msg = intval($_POST['id_msg']);
        $new_message = htmlspecialchars(trim($_POST['new_message']));

        try {
            $sql = "UPDATE msg_table SET txt_msg = :new_message WHERE id_msg = :id_msg";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':new_message' => $new_message,
                ':id_msg' => $id_msg,
            ]);
            header("Location: ../form.php");
            exit();
        } catch (PDOException $e) {
            die("Erreur lors de la modification du message : " . $e->getMessage());
        }
    } else {
        die("Requête invalide.");
    }
?>
