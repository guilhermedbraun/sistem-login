<?php
    include_once('config.php');
    date_default_timezone_set('America/Sao_Paulo');
    if(isset($_POST['update']))
    {
        include_once('config.php');
        date_default_timezone_set('America/Sao_Paulo');

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];
        $endereco = $_POST['endereco'];
        $data_nasc = $_POST['data_nasc'];
        $dojo = $_POST['dojo'];
        $sensei = $_POST['sensei'];
        $kyu = $_POST['kyu'];
        $adm = $_POST['adm'];
        
        $sqlInsert = "UPDATE alunos SET
        nome='$nome',
        telefone='$telefone',
        email='$email',
        senha='$senha',
        estado='$estado',
        cidade='$cidade',
        endereco='$endereco',
        data_nasc='$data_nasc',
        dojo='$dojo',
        sensei='$sensei',
        kyu='$kyu',
        adm='$adm'
        WHERE id=$id";
        $result = $conexao->query($sqlInsert);
        //print_r($result);
    }
    header('Location: ../adm/index.php');

?>