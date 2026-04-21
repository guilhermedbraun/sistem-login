<?php

    if(!empty($_GET['id']))
    {
        session_start();
        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT *  FROM historico WHERE id=$id";

        $result = $conexao4->query($sqlSelect);

        if($_SESSION['adm'] > 1)
        {
            header('Location: ../aulas/index.php');
        }
        elseif($_SESSION['adm'] == 1)
        {
            header('Location: ./historico.php');
        }
        else
        {
            if($result->num_rows > 0)
            {
                $sqlDelete = "DELETE FROM historico WHERE id=$id";
                $resultDelete = $conexao4->query($sqlDelete);
            }
        }
    }
    header('Location: ./historico.php');

?>