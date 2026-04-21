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
            $logado = $_SESSION['adm'] < 2;
            if(!empty($_GET['id']))
            {
                $id = $_GET['id'];
                $sqlSelect = "SELECT * FROM alunos WHERE id=$id";
                $result = $conexao->query($sqlSelect);
                if($result->num_rows > 0)
                {
                    while($user_data = mysqli_fetch_assoc($result))
                    {
                        $nome = $user_data['nome'];
                        $telefone = $user_data['telefone'];
                        $email = $user_data['email'];
                        $senha = $user_data['senha'];
                        $estado = $user_data['estado'];
                        $cidade = $user_data['cidade'];
                        $endereco = $user_data['endereco'];
                        $data_nasc = $user_data['data_nasc'];
                        $dojo = $user_data['dojo'];
                        $sensei = $user_data['sensei'];
                        $kyu = $user_data['kyu'];
                        $adm = $user_data['adm'];
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

        <div class="box">
            <form action="../system/saveEdit.php" method="POST">
                <legend>Editar</legend>
                    <div class="formflex">
                        <div class="formColA">

                            <div class="containec">
                                <div class="input-fielc">
                                <i class='bx bx-user' ></i>
                                <input type="text" class="input" placeholder="Nome" name="nome" id="nome" value="<?php echo $nome; ?>" maxlength="50" required>
                                </div>

                                <div class="input-fielc">
                                <i class='bx bx-mobile'></i>
                                <input type="tel" class="input" placeholder="Telefone" name="telefone" id="telefone" value="<?php echo $telefone; ?>" maxlength="11" required>
                                </div>

                                <div class="input-fielc">
                                <i class='bx bx-envelope'></i>
                                <input type="text" class="input" placeholder="Email" name="email" id="email" value="<?php echo $email; ?>" maxlength="50" required>
                                </div>

                                <div class="input-fielc">
                                <i class='bx bx-lock-alt'></i>
                                <input type="password" class="input" placeholder="Senha 4 a 15 dígitos" name="senha" id="senha" value="<?php echo $senha; ?>" minlength="4" maxlength="15" required>
                                </div>

                                <div class="input-fielc">
                                <i class='bx bx-map' ></i>
                                <input type="text" class="input" placeholder="Estado" name="estado" id="estado" value="<?php echo $estado; ?>" maxlength="2" required>
                                </div>

                                <div class="input-fielc">
                                <i class='bx bx-map' ></i>
                                <input type="text" class="input" placeholder="Cidade" name="cidade" id="cidade" value="<?php echo $cidade; ?>" maxlength="50" required>
                                </div>

                                <div class="input-fielc">
                                <i class='bx bx-street-view' ></i>
                                <input type="text" class="input" placeholder="Endereço" name="endereco" id="endereco" value="<?php echo $endereco; ?>" maxlength="50" required>
                                </div>

                            </div>
                        </div>
                        <div class="formColB">
                            <div class="containec">
                                <div class="seletor">
                                    <p>Data de Nasc:</p>
                                    <div class="ano">
                                    <input type="date" name="data_nasc" id="data_nasc" value="<?php echo $data_nasc; ?>" required>
                                    </div>
                                </div>

                                <div class="seletor">
                                    <p>Dojo:</p>
                                    <div class="select">
                                        <select id="dojo" name="dojo" required>
                                            <option value="<?php echo $dojo; ?>"><?php echo $dojo; ?></option>
                                            <option value="Ninja Kan Dojo Mendanha">Ninja Kan Dojo Mendanha</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="seletor">
                                    <p>Sensei:</p>
                                    <div class="select">
                                        <select id="sensei" name="sensei" required>
                                            <option value="<?php echo $sensei; ?>"><?php echo $sensei; ?></option>
                                            <option value="Guilherme">Guilherme</option>
                                        </select>
                                    </div>
                                </div>
                                                
                                <div class="seletor">
                                    <p>Kuy:</p>
                                    <div class="select">
                                        <select id="kyu" name="kyu">
                                        <option value="<?php echo $kyu; ?>">
                                        <?php
                                            switch ($kyu) {
                                                case 1:
                                                    echo "10º Kyu";
                                                    break;
                                                case 2:
                                                    echo "9º Kyu";
                                                    break;
                                                case 3:
                                                    echo "8º Kyu";
                                                    break;
                                                case 4:
                                                    echo "7º Kyu";
                                                    break;
                                                case 5:
                                                    echo "6º Kyu";
                                                    break;
                                                case 6:
                                                    echo "5º Kyu";
                                                    break;
                                                case 7:
                                                    echo "4º Kyu";
                                                    break;
                                                case 8:
                                                    echo "3º Kyu";
                                                    break;
                                                case 9:
                                                    echo "2º Kyu";
                                                    break;
                                                case 10:
                                                    echo "1º Kyu";
                                                    break;
                                                case 11:
                                                    echo "1º Dan";
                                                    break;
                                                case 12:
                                                    echo "2º Dan";
                                                    break;
                                                case 13:
                                                    echo "3º Dan";
                                                    break;
                                                case 14:
                                                    echo "4º Dan";
                                                    break;
                                                case 15:
                                                    echo "5º Dan";
                                                    break;
                                                case 16:
                                                    echo "6º Dan";
                                                    break;
                                                case 17:
                                                    echo "7º Dan";
                                                    break;
                                                case 18:
                                                    echo "8º Dan";
                                                    break;
                                                case 19:
                                                    echo "9º Dan";
                                                    break;
                                                case 20:
                                                    echo "10º Dan";
                                                    break;
                                                case 21:
                                                    echo "11º Dan";
                                                    break;
                                                case 22:
                                                    echo "12º Dan";
                                                    break;
                                                case 23:
                                                    echo "13º Dan";
                                                    break;
                                                case 24:
                                                    echo "14º Dan";
                                                    break;
                                                case 25:
                                                    echo "15º Dan";
                                                    break;
                                                default:
                                                    echo "Desconhecido";
                                                    break;
                                                }
                                            
                                            ?>
                                                                    </option>
                                            <option value="1">10º Kyu</option>
                                            <option value="2"> 9º Kyu</option>
                                            <option value="3"> 8º Kyu</option>
                                            <option value="4"> 7º Kyu</option>
                                            <option value="5"> 6º Kyu</option>
                                            <option value="6"> 5º Kyu</option>
                                            <option value="7"> 4º Kyu</option>
                                            <option value="8"> 3º Kyu</option>
                                            <option value="9"> 2º Kyu</option>
                                            <option value="10"> 1º Kyu</option>
                                            <option value="11">1º Dan</option>
                                            <option value="12">2º Dan</option>
                                            <option value="13">3º Dan</option>
                                            <option value="14">4º Dan</option>
                                            <option value="15">5º Dan</option>
                                            <option value="16">6º Dan</option>
                                            <option value="17">7º Dan</option>
                                            <option value="18">8º Dan</option>
                                            <option value="19">9º Dan</option>
                                            <option value="20">10º Dan</option>
                                            <option value="21">11º Dan</option>
                                            <option value="22">12º Dan</option>
                                            <option value="23">13º Dan</option>
                                            <option value="24">14º Dan</option>
                                            <option value="25">15º Dan</option>
                                        </select>
                                    </div>
                                </div>

                                <?php
                                    if($_SESSION['adm'] > 0) {
                                        echo '<style>.oculto { display: none; }</style>';
                                    }
                                ?>

                                <div class="caract oculto">
                                    <p>Nível do Usuário:</p>
                                        <div class="tipo-list">
                                            <div class="tipo">
                                                <input type="radio" id="aluno" name="adm" value="2" <?php echo ($adm == '2') ? 'checked' : ''; if ($_SESSION['adm'] > 0) echo "disabled"; ?> required>
                                                <label for="aluno">Aluno</label>
                                            </div>

                                            <div class="tipo">
                                                <input type="radio" id="auxiliar" name="adm" value="1" <?php echo ($adm == '1') ? 'checked' : ''; if ($_SESSION['adm'] > 0) echo "disabled"; ?> required>
                                                <label for="auxiliar">Auxiliar</label>
                                            </div>

                                            <div class="tipo">
                                                <input type="radio" id="administrador" name="adm" value="0" <?php echo ($adm == '0') ? 'checked' : ''; if ($_SESSION['adm'] > 0) echo "disabled"; ?> required>
                                                <label for="administrador">Administrador</label>
                                            </div>
                                        </div>
                                </div>

                                <div class="input-field">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="submit" name="update" class="submit" value="Salvar">
                                </div>
                            </div>
                        </div>
                    </div>

            </form>
        </div>
    </section>
        <?php 
            $footer_class='footer';
            include_once('../views/footer.php');
        ?>
        <script src="../js/menubar.js"></script>
        <script src="../js/sidebar.js"></script>
    </body>
</html>