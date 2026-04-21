<?php
    if(!isset($_SESSION['ativo']))
    {
        header('Location: ../index.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="../img/icon.png" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/root.css" />
        <link rel="stylesheet" href="../css/prostyle.css" />
        <link rel="stylesheet" href="../css/sidebar.css" />
        <link rel="stylesheet" href="../css/accordion.css" />
        <link rel="stylesheet" href="../css/responsivo.css" />
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://kit.fontawesome.com/c4254e24a8.js"></script>
        <title>Ninja Kan Dojo - Mendanha</title>
    </head>
<body>