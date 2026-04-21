<?php
    if(isset($_POST['submit'])) {

    include_once('../system/config.php');
    date_default_timezone_set('America/Sao_Paulo');
    $atualdata = date("Y-m-d");

    $alunos_id = addslashes($_POST['alunos_id']);
    $nome = addslashes($_POST['nome']);
    $descricao = addslashes($_POST['descricao']);
    $valor = addslashes($_POST['valor']);
    $tipo = addslashes($_POST['tipo']);
    $diadata = date("d", strtotime($atualdata));
    $meses = date("n", strtotime($atualdata));
    $anos = date("Y", strtotime($atualdata));

    $result = mysqli_query($conexao, "INSERT INTO financa(alunos_id, nome, descricao, valor, tipo, diadata, meses, anos) 
    VALUES ('$alunos_id', '$nome', '$descricao', '$valor', '$tipo', '$diadata', '$meses', '$anos')");
    //print_r($result);
    }
    header('Location: ./index.php');
?>