<?php
    session_start();
    include_once('../system/config.php');

    if($_SESSION['adm'] > 0)
    {
        header('Location: disciplina.php'); // alterar para a nova cópia
    }
    else
    {
        // print_r($_SESSION);// retirar
        $logado = $_SESSION['adm'] < 1;
        if (!empty($_GET['id']))
        {
            include_once('config.php');
            $id = $_GET['id'];
            $sqlSelect = "SELECT * FROM disciplina WHERE id=$id"; // alterar para a nova cópia
            $result = $conexao2->query($sqlSelect); // alterar para a nova cópia
            if ($result->num_rows > 0)
            {
                while ($user_data = mysqli_fetch_assoc($result))
                {
                    $conteudos = $user_data['conteudos'];
                }
            }
            else
            {
                header('Location: disciplina.php'); // alterar para a nova cópia
            }
        }
        else
        {
            header('Location: disciplina.php'); // alterar para a nova cópia
        }
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
            <section class="sections">

                <div class="boxr">
                    <form action="savereg.php" method="POST">
                        <legend>Editar</legend>

                        <div class="inputBox">
                            <textarea name="conteudos" id="conteudos" class="inputRUser" maxlength="500" required rows="6" cols="20"><?php echo $conteudos; ?></textarea>
                            <label for="conteudos" class="labelRInput">Escreva a alteração...</label>
                        </div>

                        <div class="input-field">
                            <input type="hidden" name="id" value=<?php echo $id; ?>>
                            <input type="submit" name="dupdate" class="submit" value="Salvar">
                        </div>

                    </form>
                </div>
            </section>
        </section>
    <script src="../js/menubar.js"></script>
    <script src="../js/sidebar.js"></script>
    </body>
</html>