<?php

    if(isset($_POST['update']))
    {
        include_once('../system/config.php');
        date_default_timezone_set('America/Sao_Paulo');
        $atualdata = date("Y-m-d");

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $tipo = $_POST['tipo'];
        $diadata = $_POST['diadata'];
        $meses = $_POST['meses'];
        $anos = $_POST['anos'];
        
        $sqlInsert = "UPDATE financa SET
        nome='$nome',
        descricao='$descricao',
        valor='$valor',
        tipo='$tipo',
        diadata='$diadata',
        meses='$meses',
        anos='$anos'
        WHERE id=$id";
        $result = $conexao->query($sqlInsert);
        //print_r($result);
    }
    header('Location: ./index.php');

?>