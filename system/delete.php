<?php

session_start();
include_once('config.php');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $sqlSelect1 = "SELECT * FROM alunos WHERE id=$id";
    $sqlSelect2 = "SELECT * FROM graduacao WHERE id=$id";

    $result1 = $conexao->query($sqlSelect1);
    $result2 = $conexao->query($sqlSelect2);

    if ($_SESSION['adm'] > 1) {
        header('Location: ../aulas/index.php');
    } elseif ($_SESSION['adm'] == 1) {
        header('Location: ../adm/index.php');
    } else {
        if ($result1->num_rows > 0 || $result2->num_rows > 0) {
            // Verifique se o usuário a ser deletado é um administrador com adm = 0
            $isAdmin = false;

            if ($result1->num_rows > 0) {
                $row = $result1->fetch_assoc();
                $isAdmin = ($row['adm'] == 0);
            } elseif ($result2->num_rows > 0) {
                $row = $result2->fetch_assoc();
                $isAdmin = ($row['adm'] == 0);
            }

            // Executar a lógica de exclusão apenas se não for um administrador com adm = 0
            if (!$isAdmin) {
                $sqlDelete1 = "DELETE FROM alunos WHERE id=$id";
                $resultDelete1 = $conexao->query($sqlDelete1);

                $sqlDelete2 = "DELETE FROM graduacao WHERE id=$id";
                $resultDelete2 = $conexao->query($sqlDelete2);
            } else {
                // Exibir uma mensagem ou tomar outra ação, pois não é permitido excluir um admin com adm = 0
                echo "Você não pode excluir um administrador com adm = 0.";
            }
        }
    }
}

header('Location: ../adm/index.php');
?>