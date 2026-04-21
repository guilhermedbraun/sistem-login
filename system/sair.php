<?php
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    unset($_SESSION['adm']);
    unset($_SESSION['kyu']);
    unset($_SESSION['ativo']);
    header('Location: ../index.php');
?>