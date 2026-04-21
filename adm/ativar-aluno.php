<?php
    session_start();
    include_once('../system/config.php');

    if($_SESSION['ativo'] > 0)
    {
        if($_SESSION['adm'] > 1)
        {
            header('Location: ../aulas/index.php');
        }
        else
        {
        // print_r($_SESSION);// retirar
            $logado = $_SESSION['adm'] < 1;
            if (!empty($_GET['id']))
            {
                $id = $_GET['id'];
                $sqlSelect = "SELECT * FROM alunos WHERE id=$id";
                $result = $conexao->query($sqlSelect);
                if ($result->num_rows > 0)
                {
                    while ($user_data = mysqli_fetch_assoc($result))
                    {
                        $ativo = $user_data['ativo'];
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
    }
    else
    {
        header('Location: ../index.php'); // header('Location: ../checkout/index.php');
    }

    /* Exibição do kyu e Dan */
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
    <section class="sections">

            <div class="boxs">
            <form action="../system/saveAtivo.php" method="POST">
                        <legend>Ativar</legend>

                    <div class="caract oculto">
                        <p>Ativação do Usuário:</p>
                            <div class="tipo-list">
                                <div class="tipo">
                                    <input type="radio" id="ativo" name="ativo" value="1" <?php echo ($ativo == '1') ? 'checked' : ''; if ($_SESSION['adm'] > 0) echo "disabled"; ?> required>
                                    <label for="ativo">Ativo</label>
                                </div>

                                <div class="tipo">
                                    <input type="radio" id="ativo" name="ativo" value="0" <?php echo ($ativo == '0') ? 'checked' : ''; if ($_SESSION['adm'] > 0) echo "disabled"; ?> disabled required>
                                    <label for="ativo">Inativo</label>
                                </div>
                            </div>
                    </div>

                    <div class="input-field">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="update" class="submit" value="Salvar">
                    </div>
                    
            </form>
        </div>
    </section>
</section>
    <script src="../js/menubar.js"></script>
    <script src="../js/sidebar.js"></script>
</body>
</html>