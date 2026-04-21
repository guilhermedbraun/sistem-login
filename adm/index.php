<?php
    session_start();
    include_once('../system/config.php');
    include_once('../system/timeout.php');

//    print_r($_SESSION);// retirar
    
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['id']);
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset($_SESSION['adm']);
        unset($_SESSION['kyu']);
        unset($_SESSION['ativo']);
        header('Location: ../index.php');
    }
    elseif($_SESSION['ativo'] > 0)
    {
        $logado = $_SESSION['adm'] ==  0 || 1;
        if($_SESSION['adm'] > 1)
        {
            header('Location: ../aulas/index.php');
        }
        elseif(!empty($_GET['search']))
        {
            $data = $_GET['search'];
            $sql = "SELECT * FROM alunos WHERE nome LIKE '%$data%' or email LIKE '%$data%' or dojo LIKE '%$data%' or sensei LIKE '%$data%' or kyu LIKE '%$data%' or adm LIKE '%$data%' or ativo LIKE '%$data%' ORDER BY id ASC";
        }
        else
        {
            $sql = "SELECT * FROM alunos ORDER BY id DESC";
        }
        $resulta = $conexao->query($sql);
    // echo "Session variables are set.";// retirar
    }
    else
    {
        header('Location: ../index.php'); // header('Location: ../checkout/index.php');
    }

    /* Exibição do kyu 0 = Dan */
    function obterDescricaoKyuDan($valor)
    {
    $mapaKyuDan = [
    1 => '10º Kyu',
    2 => '9º Kyu',
    3 => '8º Kyu',
    4 => '7º Kyu',
    5 => '6º Kyu',
    6 => '5º Kyu',
    7 => '4º Kyu',
    8 => '3º Kyu',
    9 => '2º Kyu',
    10 => '1º Kyu',
    11 => '1º Dan',
    12 => '2º Dan',
    13 => '3º Dan',
    14 => '4º Dan',
    15 => '5º Dan',
    16 => '6º Dan',
    17 => '7º Dan',
    18 => '8º Dan',
    19 => '9º Dan',
    20 => '10º Dan',
    21 => '11º Dan',
    22 => '12º Dan',
    23 => '13º Dan',
    24 => '14º Dan',
    25 => '15º Dan'
    ];

    return isset($mapaKyuDan[$valor]) ? $mapaKyuDan[$valor] : 'Desconhecido';
    }
    require_once('../views/header.php');
    require_once('../views/nav.php');
    require_once('../views/sidebar.php');
?>
        <section class="pection">

                <div class="painel">

                    <div class="admX">
                        <div class="admXpainel">
                            <h3>Administradores</h3>
                                <?php
                                $sql1 = "SELECT COUNT(*) AS totalAdmin FROM alunos WHERE adm IN (0, 1);";

                                $result = $conexao->query($sql1);

                                $row = $result->fetch_assoc();
                                $totalAdmin = $row['totalAdmin'];
                                ?>
                            <h4>Total: <?php echo $totalAdmin; ?></h4>
                        </div>
                        <img src="../img/1-adm.png" alt="adm">
                    </div>

                    <div class="alunosX">
                        <div class="alunosXpainel">
                            <h3>Alunos</h3>
                                <?php
                                $sql2 = "SELECT COUNT(*) AS totalAlunos FROM alunos WHERE adm IN (2);";

                                $result = $conexao->query($sql2);

                                $row = $result->fetch_assoc();
                                $totalAlunos = $row['totalAlunos'];
                                ?>
                            <h4>Total: <?php echo $totalAlunos; ?></h4>
                        </div>
                        <img src="../img/2-alunos.png" alt="alunos">
                    </div>

                    <div class="ativosX">
                        <div class="ativosXpainel">
                            <h3>Ativos</h3>
                                <?php
                                $sql3 = "SELECT COUNT(*) AS totalAtivos FROM alunos WHERE ativo IN (1);";

                                $result = $conexao->query($sql3);

                                $row = $result->fetch_assoc();
                                $totalAtivos = $row['totalAtivos'];
                                ?>
                            <h4>Total: <?php echo $totalAtivos; ?></h4>
                        </div>
                        <img src="../img/3-ativo.png" alt="ativos">
                    </div>
                </div>

                <div class="search" id="lupa">
                    <input type="search" class="box-search" placeholder="Pesquisar" id="pesquisar">
                    <button onclick="searchData()" class="btn-pesquisar"></button>
                </div>

                <div class="scope">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"><a>Nome</a></th>
                                <th scope="col"><a>Celular</a></th>
                                <th scope="col"><a>Email</a></th>
                                <th scope="col"><a>Dojo</a></th>
                                <th scope="col"><a>Sensei</a></th>
                                <th scope="col"><a>Kyu</a></th>
                                <th scope="col"><a>Adm</a></th>
                                <th scope="col"><a>Ativo</a></th>
                                <th scope="col"><a>Ativação</a></th>
                                <th scope="col"><a>Expiração</a></th>
                                <th scope="col"><a>Cursando</a></th>
                                <th scope="col">Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($user_data = mysqli_fetch_assoc($resulta)) {
                                /* Formatação do celular */
                                $telefone = $user_data['telefone'];
                                $codigo_area = substr($telefone, 0, 2);
                                $primeira_parte = substr($telefone, 2, 5);
                                $segunda_parte = substr($telefone, 7, 4);
                                $celular = "(" . $codigo_area . ")" . $primeira_parte . "-" . $segunda_parte;
                                /* Exibição dos Admins*/
                                $adm = $user_data['adm'];
                                if ($adm == 0) {
                                    $adm_output = "Admin";
                                } elseif ($adm == 1) {
                                    $adm_output = "Aux";
                                } else {
                                    $adm_output = "Aluno";
                                }
                                 /* Exibição do Ativo 1 = sim e 0 = não */
                                 $activo = $user_data['ativo'];
                                 if ($activo == 0) {
                                    $activo_output = "Não";
                                 } else {
                                    $activo_output = "Sim";
                                 }
                                /* Exibição do bloqueado 0 = Banido */
                                $locked = $user_data['locked'];
                                if ($locked == 0) {
                                    $locked_output = "Banido";
                                    $btnLockClass = 'btn-lock btn-disabled';
                                } else {
                                    $locked_output = "Sim";
                                    $btnLockClass = 'btn-lock';
                                }
                                /* Exibição do Botão perfil: Ficha técnica para ADM 0 */
                                if($_SESSION['adm'] > 0) {
                                    echo '<style>#admsys { display: none; }</style>';
                                }

                            
                                    echo "<tr>";
                                    echo "<td>".$user_data['nome']."</td>";
                                    echo "<td>".$celular."</td>";
                                    echo "<td>".$user_data['email']."</td>";
                                    echo "<td>".$user_data['dojo']."</td>";
                                    echo "<td>".$user_data['sensei']."</td>";
                                    echo "<td>" . obterDescricaoKyuDan($user_data['kyu']) . "</td>";
                                    echo "<td>".$adm_output."</td>";
                                    echo "<td>".$activo_output."</td>";
                                    echo "<td>".date('d-m-Y', strtotime($user_data['ativacao']))."</td>";
                                    echo "<td>".date('d-m-Y', strtotime($user_data['expiracao']))."</td>";
                                    echo "<td>".$locked_output."</td>";

                                    echo "<td id='btn-dash'>
                                            <a class='btn-pencil' href='editar.php?id=$user_data[id]' title='Editar Cadastro'><img src='../img/pencil.png'></a>
                                            <a class='btn-user' id='admsys' href='graduacao.php?id=$user_data[id]' title='Ficha de Graduação'><img src='../img/user.png'></a>
                                            <a class='btn-trash' href='emergencia.php?id=$user_data[id]' title='Editar Ficha Médica'><img src='../img/emergencia.png'></a>
                                            <a class='btn-user' id='admsys' href='ativar-aluno.php?id=$user_data[id]' title='Ativar Aluno'><img src='../img/active-user.png'></a>
                                            <a class='$btnLockClass' href='../system/lock.php?id=$user_data[id]' title='Bloquear' onclick='return confirmaLock()'><img src='../img/lock.png'></a>
                                            <a class='btn-trash' href='../system/delete.php?id=$user_data[id]' title='Deletar' onclick='return confirmaDelete()'><img src='../img/trash.png'></a>
                                        </td>";
                                    echo "</tr>";
                                }
                                ?>
                        </tbody>
                        <thead class="tablefooter">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>

            
        </section>
        <?php 
            $footer_class='footer';
            include_once('../views/footer.php');
        ?>

    <script>
        function confirmaLock() {
            return confirm("Deseja bloquear ou desbloquear o usuário?");
        }
        function confirmaDelete() {
            return confirm("Deseja excluir o usuário?");
        }
    </script>
    <script src="../js/menubar.js"></script>
    <script src="../js/dashboard.js"></script>
    <script src="../js/sidebar.js"></script>
    </body>
</html>