<?php

    if(!empty($_GET['id']))
    {
        session_start();
        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT *  FROM regras WHERE id=$id";

        $result = $conexao3->query($sqlSelect);

        if($_SESSION['adm'] > 1)
        {
            header('Location: ../aulas/index.php');
        }
        elseif($_SESSION['adm'] == 1)
        {
            header('Location: ./regras.php');
        }
        else
        {
            if($result->num_rows > 0)
            {
                $sqlDelete = "DELETE FROM regras WHERE id=$id";
                $resultDelete = $conexao3->query($sqlDelete);
            }
        }
    }
    header('Location: ./regras.php');

?>