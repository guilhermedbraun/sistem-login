<?php
    include_once('config.php');
    if(isset($_POST['rupdate']))
    {
        $id = $_POST['id'];
        $conteudos = $_POST['conteudos'];

        $sqlInsert = "UPDATE regras SET conteudos = '$conteudos' WHERE id = '$id'";
        $result = $conexao3->query($sqlInsert);
        print_r($result);
    }
    header('Location: ./regras.php');

?>