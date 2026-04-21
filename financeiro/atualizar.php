<?php
    session_start();
    include_once('../system/config.php');

    if($_SESSION['adm'] > 0)
    {
        header('Location: ../aulas/index.php');
    }
    else
    {
    // print_r($_SESSION);// retirar
        $logado = $_SESSION['adm'] < 1;
        if(!empty($_GET['id']))
        {
            $id = $_GET['id'];
            $sqlSelect = "SELECT * FROM financa WHERE id=$id";
            $result = $conexao->query($sqlSelect);
            if($result->num_rows > 0)
            {
                while($user_data = mysqli_fetch_assoc($result))
                {
                    $mostratipo = $user_data['tipo'];
                    if ($mostratipo == 2) {
                        $mostratipo_output = "Saída";
                    } else {
                        $mostratipo_output = "Entrada";
                    }
                    
                    $nome = $user_data['nome'];
                    $descricao = $user_data['descricao'];
                    $valor = $user_data['valor'];
                    $tipo = $user_data['tipo'];
                    $diadata = $user_data['diadata'];
                    $meses = $user_data['meses'];
                    $anos = $user_data['anos'];
                }
            }
            else
            {
                header('Location: ./index.php');
            }
        }
        else
        {
            header('Location: ./index.php');
        }
    }

    require_once('../views/header.php');
    require_once('../views/nav.php');
    require_once('../views/sidebar.php');
?>
    <section class="sections">

            <form action="./editar.php" method="POST">
                <div class="updateEntrada">
                    <div class="input-fielf">
                        <i class='bx bx-user' ></i>
                        <input type="text" class="input" placeholder="Nome" name="nome" id="nome" value="<?php echo $nome; ?>" maxlength="50" required>
                    </div>
                    <div class="input-fielf">
                        <i class='bx bx-pen' ></i>
                        <input type="text" class="input" placeholder="Descrição" name="descricao" id="descricao" value="<?php echo $descricao; ?>" maxlength="100" required>
                    </div>
                    <div class="input-fielf">
                        <i class='bx bx-dollar' ></i>
                        <input type="number" class="input" placeholder="Valor" name="valor" id="valor" value="<?php echo $valor; ?>" maxlength="5" required>
                    </div>
                    <div class="input-fielf">
                        <i class='bx bx-down-arrow-alt'></i>
                        <select id="tipo" name="tipo" required>
                            <option value="<?php echo $tipo; ?>"><?php echo $mostratipo_output; ?></option>
                            <option value="1">Entrada</option>
                            <option value="2">Saída</option>
                        </select>
                    </div>
                    <div class="input-fielf">
                        <i class='bx bx-calendar'></i>
                        <input type="number" class="input" placeholder="Dia" name="diadata" id="diadata" value="<?php echo $diadata; ?>" maxlength="2" required>
                    </div>
                        <div class="input-fielf">
                        <i class='bx bx-calendar'></i>
                        <input type="number" class="input" placeholder="Mês" name="meses" id="meses" value="<?php echo $meses; ?>" maxlength="2" required>
                    </div>
                    <div class="input-fielf">
                        <i class='bx bx-calendar'></i>
                        <input type="number" class="input" placeholder="Ano" name="anos" id="anos" value="<?php echo $anos; ?>" maxlength="4" required>
                    </div>
                    <div class="input-field">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="update" class="submif" value="Salvar">
                    </div>
                </div>
            </form>

    </section>
        <?php 
            $footer_class='footer';
            include_once('../views/footer.php');
        ?>
        <script src="../js/menubar.js"></script>
        <script src="../js/sidebar.js"></script>
    </body>
</html>