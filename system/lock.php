<?php

session_start();
include_once('config.php');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM alunos WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if ($_SESSION['adm'] > 1) {
        header('Location: ../aulas/index.php');
    } elseif ($_SESSION['adm'] == 1) {
        header('Location: ../adm/index.php');
    } else {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            // Verifique se o usuário a ser bloqueado é um administrador com adm = 0
            if ($row['adm'] == 0) {
                // Exibir uma mensagem ou tomar outra ação, pois não é permitido bloquear um admin com adm = 0
                echo "Você não pode bloquear um administrador!";
            } else {
                // Executar a lógica de bloqueio
                $locked = ($row['locked'] == 0) ? 1 : 0;
                $sqlUpdate = "UPDATE alunos SET locked='$locked' WHERE id=$id";
                $result = $conexao->query($sqlUpdate);
            }
        }
    }
}
header('Location: ../adm/index.php');

?>