<?php
    include_once('config.php');
    if(isset($_POST['dupdate']))
    {
        $id = $_POST['id'];
        $conteudos = $_POST['conteudos'];

        $sqlInsert = "UPDATE disciplina SET conteudos = '$conteudos' WHERE id = '$id'"; // alterar para a nova cópia
        $result = $conexao2->query($sqlInsert); // alterar para a nova cópia
        print_r($result);
    }
    header('Location: ./disciplina.php'); // alterar para a nova cópia

?>