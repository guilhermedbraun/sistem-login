<?php
    if(!isset($_SESSION['ativo']))
    {
        header('Location: ../index.php');
    }
?>

<div class="sidebar">
    <div class="logo-details">
      <div class="logo_name"><img src="../img/logo.png"></div>
      <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="../adm/index.php">
        <i class='bx bx-search-alt-2' ></i>
        <span class="links_name">Pesquisa</span>
        </a>
        <span class="tooltip">Pesquisa</span>
      </li>

      <li>
        <a href="../adm/cadastro.php">
        <i class='bx bx-user-plus' ></i>
        <span class="links_name">Cadastrar</span>
        </a>
        <span class="tooltip">Cadastrar</span>
      </li>

      <li>
        <a href="../financeiro/index.php">
        <i class='bx bx-dollar' ></i>
        <span class="links_name">Financeiro</span>
        </a>
        <span class="tooltip">Financeiro</span>
      </li>

      <li>
        <a href="../historico/historico.php">
        <i class='bx bx-history' ></i>
        <span class="links_name">Histórico</span>
        </a>
        <span class="tooltip">Histórico</span>
      </li>

      <li>
        <a href="../historico/index.php">
        <i class='bx bx-add-to-queue' ></i>
        <span class="links_name">Add Histórico</span>
        </a>
        <span class="tooltip">Add Histórico</span>
      </li>

      <li>
        <a href="../disciplina/index.php">
        <i class='bx bx-message-add' ></i>
        <span class="links_name">Add Ética</span>
        </a>
        <span class="tooltip">Add Ética</span>
      </li>

      <li>
        <a href="../regras/index.php">
        <i class='bx bx-comment-add' ></i>
        <span class="links_name">Add Regras</span>
        </a>
        <span class="tooltip">Add Regras</span>
      </li>

    </ul>
  </div>