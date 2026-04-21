<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {
        include_once('config.php');

        $id = $_POST['id'];
        $contato1 = $_POST['contato1'];
        $telefone1 = $_POST['telefone1'];
        $contato2 = $_POST['contato2'];
        $telefone2 = $_POST['telefone2'];
        $contato3 = $_POST['contato3'];
        $telefone3 = $_POST['telefone3'];
        $alergia = $_POST['alergia'];
        $remedio = $_POST['remedio'];
        $deficiencia = $_POST['deficiencia'];
        $hospital = $_POST['hospital'];
        
        $sqlInsert = "UPDATE emergencia SET
        contato1='$contato1',
        telefone1='$telefone1',
        contato2='$contato2',
        telefone2='$telefone2',
        contato3='$contato3',
        telefone3='$telefone3',
        alergia='$alergia',
        remedio='$remedio',
        deficiencia='$deficiencia',
        hospital='$hospital'
        WHERE id=$id";
        $result = $conexao->query($sqlInsert);
        //print_r($result);
    }
    header('Location: ../adm/index.php');

?>