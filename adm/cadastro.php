<?php
    session_start();
    include_once('../system/config.php');

    if($_SESSION['ativo'] > 0)
    {
        if($_SESSION['adm'] > 1)
        {
            header('Location: ../aulas/index.php');
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
                <form action="../adm/cadastro.php" method="POST">
                    <legend>Cadastrar</legend>
                            <?php
                            if(isset($_POST['submit'])) {

                                include_once('../system/config.php');
                                date_default_timezone_set('America/Sao_Paulo');

                                $nome = addslashes($_POST['nome']);
                                $telefone = addslashes($_POST['telefone']);
                                $email = addslashes($_POST['email']);
                                $senha = addslashes($_POST['senha']);
                                $estado = addslashes($_POST['estado']);
                                $cidade = addslashes($_POST['cidade']);
                                $endereco = addslashes($_POST['endereco']);
                                $data_nasc = addslashes($_POST['data_nasc']);
                                $dojo = addslashes($_POST['dojo']);
                                $sensei = addslashes($_POST['sensei']);
                                $kyu = addslashes($_POST['kyu']);
                                $adm = addslashes($_POST['adm']);
                                $inscricao = date("Y-m-d");
                                $ativo = addslashes($_POST['ativo']);
                                $ativacao = date("Y-m-d");
                                $expiracao = date("Y-m-d");
                                $locked = addslashes($_POST['locked']);
                                $kyu10 = date("Y-m-d");

                                $sqlCheckEmail = "SELECT id FROM alunos WHERE email='$email'";
                                $resultCheckEmail = $conexao->query($sqlCheckEmail);

                                if ($resultCheckEmail->num_rows > 0) {

                            ?>
                                    <div class="msg_erro">
                                        Email já cadastrado!
                                    <?php echo "
                                        <script>
                                            setTimeout(function() {
                                                window.location.href = './index.php';
                                            }, 3000);
                                        </script>";
                                    ?> 
                                    </div>
                            <?php
                                }
                                else
                                {
                                    $result = mysqli_query($conexao, "INSERT INTO alunos(nome,telefone,email,senha,estado,cidade,endereco,data_nasc,dojo,sensei,kyu,adm,inscricao,ativo,ativacao,expiracao,locked) 
                                    VALUES ('$nome','$telefone','$email','$senha','$estado','$cidade','$endereco','$data_nasc','$dojo','$sensei','$kyu','$adm','$inscricao','$ativo','$ativacao','$expiracao','$locked')");

                                    // Obter o ID do aluno inserido
                                    $alunos_id = mysqli_insert_id($conexao);

                                    // Inserir na tabela graduacao associando ao alunos_id
                                    $result = mysqli_query($conexao, "INSERT INTO graduacao(alunos_id, kyu10) 
                                    VALUES ('$alunos_id', '$kyu10')");

                                    // Inserir na tabela emergencia associando ao alunos_id
                                    $result = mysqli_query($conexao, "INSERT INTO emergencia(alunos_id) 
                                    VALUES ('$alunos_id')");

                                    ?>
                                    <div class='msg_sucesso'>
                                        Cadastrado com sucesso!
                                    <?php echo "
                                        <script>
                                            setTimeout(function() {
                                                window.location.href = './index.php';
                                            }, 3000);
                                        </script>";
                                    ?>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        <div class="formflex">
                            <div class="formColA">

                                <div class="containec">
                                    <div class="input-fielc">
                                        <i class='bx bx-user' ></i>
                                        <input type="text" class="input" placeholder="Nome" name="nome" id="nome" maxlength="50" required>
                                    </div>

                                    <div class="input-fielc">
                                        <i class='bx bx-mobile'></i>
                                        <input type="tel" class="input" placeholder="Telefone" name="telefone" id="telefone" maxlength="11" required>
                                    </div>

                                    <div class="input-fielc">
                                        <i class='bx bx-envelope'></i>
                                        <input type="text" class="input" placeholder="Email" name="email" id="email" maxlength="50" required>
                                    </div>

                                    <div class="input-fielc">
                                        <i class='bx bx-lock-alt'></i>
                                        <input type="password" class="input" placeholder="Senha 4 a 15 dígitos" name="senha" id="senha" minlength="4" maxlength="15" required>
                                    </div>

                                    <div class="input-fielc">
                                        <i class='bx bx-map' ></i>
                                        <input type="text" class="input" placeholder="Estado" name="estado" id="estado" maxlength="2" required>
                                    </div>

                                    <div class="input-fielc">
                                        <i class='bx bx-map' ></i>
                                        <input type="text" class="input" placeholder="Cidade" name="cidade" id="cidade" maxlength="50" required>
                                    </div>

                                    <div class="input-fielc">
                                        <i class='bx bx-street-view' ></i>
                                        <input type="text" class="input" placeholder="Endereço" name="endereco" id="endereco" maxlength="50" required>
                                    </div>

                                </div>
                            </div>
                            <div class="formColB">
                                <div class="containec">
                                        
                                    <div class="seletor">
                                        <p>Data de Nasc:</p>
                                        <div class="ano">
                                            <input type="date" name="data_nasc" id="data_nasc" required>
                                        </div>
                                    </div>

                                    <div class="seletor">
                                        <p>Dojo:</p>
                                        <div class="select">
                                            <select id="dojo" name="dojo" required>
                                                <option value="" selected disabled id="disabled">???</option>
                                                <option value="Ninja Kan Dojo Mendanha">Ninja Kan Dojo Mendanha</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="seletor">
                                        <p>Sensei:</p>
                                        <div class="select">
                                            <select id="sensei" name="sensei" required>
                                                <option value="" selected disabled id="disabled">???</option>
                                                <option value="Guilherme">Guilherme</option>
                                            </select>
                                        </div>
                                    </div>
                                        
                                    <div class="seletor">
                                        <p>Kuy:</p>
                                        <div class="select">
                                            <select id="kyu" name="kyu" required>
                                                <option value="" selected disabled id="disabled">???</option>
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

                                    <div class="caract">
                                        <p>Nível do Usuário:</p>
                                        <div class="tipo-list"> 
                                            <div class="tipo">
                                                <input type="radio" id="aluno" name="adm" value="2" checked required>
                                                <label for="aluno">Aluno</label>
                                            </div>

                                            <div class="tipo">
                                                <input type="radio" id="auxiliar" name="adm" value="1" <?php if ($_SESSION['adm'] >= 1) echo "disabled"; ?> required>
                                                <label for="auxiliar">Auxiliar</label>
                                            </div>

                                            <div class="tipo">
                                                <input type="radio" id="administrador" name="adm" value="0" <?php if ($_SESSION['adm'] >= 1) echo "disabled"; ?> required>
                                                <label for="administrador">Administrador</label>
                                            </div>
                                        </div>

                                        <?php
                                            if($_SESSION['adm'] >= 0) {
                                                echo '<style>.oculto { display: none; }</style>';
                                            }
                                        ?>
                                        <div class="oculto" >
                                            <input type="radio" id="ativo" name="ativo" value="0" checked required>
                                        </div>
                                        <div class="oculto" >
                                            <input type="radio" id="locked" name="locked" value="1" checked required>
                                        </div>
                                    </div>

                                    <div class="input-field">
                                        <input type="submit" name="submit" class="submit" value="Salvar">
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