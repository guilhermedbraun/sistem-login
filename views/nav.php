<?php
    if(!isset($_SESSION['ativo']))
    {
        header('Location: ../index.php');
    }
?>
    <header class="header">
        <div class="logo">
            <img src="../img/logo.png">
        </div>

        <nav class="nav">
          <button class="btn-menu" aria-label="Abrir Menu" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
            &nbsp<span class="hamburger"></span>
          </button>
  
          <ul class="menu" id="menu" role="menu">
            <?php
              if($_SESSION['adm'] > 1) {
                echo '<style>#admsx { display: none; }</style>';
              }
                
              if($_SESSION['adm'] > 1) {
                echo '<style>#admsy { display: none; }</style>';
              }
            ?>
            
            <li id="admsx"><a href="../adm/index.php">Dashboard</a></li>
            <li id="admsy">
              <a class="subv1" href="#" onclick="dropA()">Dashboard
                <span class="left-icon"></span>  
                <span class="right-icon"></span>
              </a>
              <ul class="submenu" id="submenu1">
                    <li><a href="../adm/index.php">Pesquisa</a></li>
                    <li><a href="../adm/cadastro.php">Cadastro</a></li>
                    <li><a href="../financeiro/index.php">Financeiro</a></li>
                    <li><a href="../historico/historico.php">Histórico</a></li>
                    <li><a href="../historico/index.php">+ Histórico</a></li>
                    <li><a href="../disciplina/index.php">+ Éticas</a></li>
                    <li><a href="../regras/index.php">+ Regras</a></li>
                    <li class="nbsp">&nbsp</li>
              </ul>
            </li>

            <li>
              <a class="subv2" href="#" onclick="dropB()">Aulas
                <span class="left-icon"></span>  
                <span class="right-icon"></span>
              </a>
                <ul class="submenu" id="submenu2">
                    <li><a href="../aulas/index.php">Ninjutsu</a></li>
                    <li><a href="#">Em Breve</a></li>
                    <li class="nbsp">&nbsp</li>
                </ul>
            </li>

            <li>
              <a class="subv3" href="../aulas/apostilas.php" onclick="dropC()">Apostilas</a>
            </li>

            <li><a href="../disciplina/disciplina.php">Ética</a></li>
            <li><a href="../regras/regras.php">Dojo</a></li>
            <li id="perfil"><a href="../system/perfil.php" id="exit" ><img src="../img/perfil.png" alt="exit"></a></li>
            <li id="sair"><a href="../system/sair.php" id="exit" ><img src="../img/exit.png" alt="exit"></a></li>
            <li><div id="switch" onclick="darkmode()"><button></button><span></span></div></li>
  
          </ul>
        </nav>
    </header>