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
            $sqli = "SELECT * FROM regras ORDER BY id DESC";
        }
        $resulta = $conexao3->query($sqli);
    }
    else
    {
        header('Location: ../checkout/index.php');
    }
    require_once('../views/header.php');
    require_once('../views/nav.php');
?>
        <section class="section">
            <div class="spacex" >

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
                                            <a class='btn-pencil' href='./editareg.php?id=$user_data[id]' title='Editar'><img src='../img/pencil.png'></a> 
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
            </div>
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
  </body>
</html>