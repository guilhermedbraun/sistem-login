<?php
    session_start();
    include_once('../system/config.php');
    include_once('../system/timeout.php');

    //print_r($_SESSION);// retirar
    
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset($_SESSION['id']);
        unset($_SESSION['adm']);
        unset($_SESSION['kyu']);
        header('Location: ../index.php');
    }
    elseif($_SESSION['ativo'] > 0)
    {
      header('Location: ../aulas/index.php');
    }

?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/root.css" />
        <link rel="stylesheet" href="./css/index.css" />
        <title>Proinchange</title>
    </head>
    <body>
    <header class="header">
        <div class="logo">
            <a href="index.php"><img src="../img/logo.png"></a>
        </div>
             <nav class="nav">
                <ul class="menu" id="menu" role="menu">
                    <li id="sair"><a href="../system/sair.php" id="sair" ><img src="../img/exit.png" alt="exit"></a></li>
                </ul>
            </nav>
        </header>
        <section class="section">
<?php
  if($_SESSION['ativo'] < 1)
  {
?>

    <div class='msg_notification'>
        <p>Realize o pagamento da mensalidade do sistema e volta a usar o nosso serviço.</p>
        <br>
        <p>Estamos direcionando você para a página!</p>
        <?php header("Refresh: 5; URL=https://pag.ae/7ZGbyd97Q"); ?> 
    </div>

    <div id="countdown"></div>

<?php
  }
?>
        </section>
        <script>
            // Defina o tempo inicial em segundos
            var timeLeft = 5;
            
            // Função que atualiza a contagem regressiva
            function updateCountdown() {
                document.getElementById('countdown').innerHTML = ' ' + timeLeft + ' ';
                
                if (timeLeft > 0) {
                    timeLeft--;
                    setTimeout(updateCountdown, 1000); // Chama a função novamente após 1 segundo
                } else {
                    document.getElementById('countdown').innerHTML = '';
                }
            }
            
            // Inicie a contagem regressiva quando a página carregar
            updateCountdown();
        </script>

    </body>
</html>