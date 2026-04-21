<?php

    if(!empty($_GET['id']))
    {
        session_start();
        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT *  FROM disciplina WHERE id=$id"; // alterar para a nova cópia

        $result = $conexao2->query($sqlSelect);

        if($_SESSION['adm'] > 1)
        {
            header('Location: ../aulas/index.php');
        }
        elseif($_SESSION['adm'] == 1)
        {
            header('Location: ./disciplina.php'); // alterar para a nova cópia
        }
        else
        {
            if($result->num_rows > 0)
            {
                $sqlDelete = "DELETE FROM disciplina WHERE id=$id"; // alterar para a nova cópia
                $resultDelete = $conexao2->query($sqlDelete); // alterar para a nova cópia
            }
        }
    }
    header('Location: ./disciplina.php'); // alterar para a nova cópia

?>