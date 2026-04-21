<?php
include_once('config.php');

// Consulta para atualizar os usuários ativos com expiração passada
$currentDate = date("Y-m-d"); // Data de hoje

$sql = "UPDATE alunos SET ativo = 0 WHERE ativo = 1 AND expiracao < '$currentDate'";
$result = $conexao->query($sql);
/*
if ($result) {
    $affectedRows = $conexao->affected_rows;
    echo "$affectedRows usuários foram desativados.";
} else {
    echo "Erro ao atualizar usuários: " . $conexao->error;
}
*/
?>
