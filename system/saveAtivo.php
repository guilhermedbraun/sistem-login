<?php
    include_once('config.php');
    date_default_timezone_set('America/Sao_Paulo');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $ativo = $_POST['ativo'];
        $ativacao = date("Y-m-d");
        $expiracao = date("Y-m-d", strtotime('+30 days'));
        
        $sqlInsert = "UPDATE alunos SET
        ativo='$ativo',
        ativacao='$ativacao',
        expiracao='$expiracao'
        WHERE id=$id";
        $result = $conexao->query($sqlInsert);
        //print_r($result);
    }
    header('Location: ../adm/index.php');

?>