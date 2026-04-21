<?php

    session_start();
    include_once('../system/config.php');
    include_once('../system/timeout.php');
    include_once('./config.php');

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
        $logado = $_SESSION['kyu'] > 0;
        if($_SESSION['kyu'] < 1)
        {
            header('Location: ../index.php');
        }
        else
        {
            $sqli = "SELECT * FROM historico ORDER BY id DESC";
        }
        $resulta = $conexao4->query($sqli);
    }
    else
    {
        header('Location: ../checkout/index.php');
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
    16 => '6º Kyu',
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
            <section class="section">

                <div class="scoper">
                    <table class="table">
                        <thead>
                            <?php
                                    if($_SESSION['adm'] > 0) {
                                        echo '<style>.admreg { display: none; }</style>';
                                    }
                                    echo "<tr>";
                                    echo "<th scope='col'>Mensagem do administrador!</th>";
                                    echo "<th scope='col' class='admreg'>...</th>";
                                    echo "</tr>";
                            ?>
                        </thead>
                        <tbody>
                            <?php
                                while($user_data = mysqli_fetch_assoc($resulta)) {
                                    if($_SESSION['adm'] > 0) {
                                        echo '<style>.admreg { display: none; }</style>';
                                    }
                                    echo "<tr>";
                                    echo "<td>".$user_data['conteudos']."</td>";
                                    echo "<td class='admreg'>
                                            <a class='btn-pencil' href='./editahist.php?id=$user_data[id]' title='Editar'><img src='../img/pencil.png'></a> 
                                            <a class='btn-trash' href='./delete.php?id=$user_data[id]' title='Deletar' onclick='return confirmaDelete()'><img src='../img/trash.png'></a>
                                        </td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                        <thead class="tablefooter">
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>
  
            </section>
        </section>
        <?php 
            $footer_class='footer';
            include_once('../views/footer.php');
        ?>

    <script>
        function confirmaDelete() {
            return confirm("Deseja excluir?");
        }
    </script>
    <script src="../js/menubar.js"></script>
    <script src="../js/sidebar.js"></script>
  </body>
</html>