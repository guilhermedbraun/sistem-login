<?php
    session_start();
    include_once('config.php');
    include_once('timeout.php');

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
            /*echo "Session Kyu are set.";// retirar*/
            if (!empty($_SESSION['id'])) {
                $id = $_SESSION['id'];
                $sqlSelect = "SELECT * FROM alunos WHERE id=$id";
                $result = $conexao->query($sqlSelect);
                if ($result->num_rows > 0)
                {
                    while ($user_data = mysqli_fetch_assoc($result)) {
                        $nome = $user_data['nome'];
                        $telefone = $user_data['telefone'];
                        $email = $user_data['email'];
                        $senha = $user_data['senha'];
                        $estado = $user_data['estado'];
                        $cidade = $user_data['cidade'];
                        $endereco = $user_data['endereco'];
                        $dojo = $user_data['dojo'];
                        $sensei = $user_data['sensei'];
                        $data_nasc = $user_data['data_nasc'];
                        $kyu = $user_data['kyu'];
                    }
                }
            }
        }
    }
    else
    {
        header('Location: ../checkout/index.php');
    }
    require_once('../views/header.php');
    require_once('../views/nav.php');
?>

    <section class="section">
        <div class="spacex">

    <nav class="navy">
            <div class="item">
                <input type="checkbox" id="check1">
                <label for="check1">Perfil do Usuário <img src="../img/user.png" alt="Icone usuário"></label>
                <div class="perfil">
                    
                    <?php
                    if($_SESSION['id']) {
                        $data = $_SESSION['id'];
                        $sql = "SELECT * FROM alunos WHERE id LIKE '%$data%'";
                    }
                    $result1 = $conexao->query($sql);
                    if($user_data = mysqli_fetch_assoc($result1)) {
                        /* Formatação do celular */
                        $telefone = $user_data['telefone'];
                        $codigo_area = substr($telefone, 0, 2);
                        $primeira_parte = substr($telefone, 2, 5);
                        $segunda_parte = substr($telefone, 7, 4);
                        $celular = "(" . $codigo_area . ")" . $primeira_parte . "-" . $segunda_parte;
                        /* Exibição do kyu 0 = Dan */
                        $kyu = $user_data['kyu'];
                        if ($kyu) {
                        $kyu_info = [
                            1 => "10º Kyu",
                            2 => "9º Kyu",
                            3 => "8º Kyu",
                            4 => "7º Kyu",
                            5 => "6º Kyu",
                            6 => "5º Kyu",
                            7 => "4º Kyu",
                            8 => "3º Kyu",
                            9 => "2º Kyu",
                            10 => "1º Kyu",
                            11 => "1º Dan",
                            12 => "2º Dan",
                            13 => "3º Dan",
                            14 => "4º Dan",
                            15 => "5º Dan",
                            16 => "6º Dan",
                            17 => "7º Dan",
                            18 => "8º Dan",
                            19 => "9º Dan",
                            20 => "10º Dan",
                            21 => "11º Dan",
                            22 => "12º Dan",
                            23 => "13º Dan",
                            24 => "14º Dan",
                            25 => "15º Dan",
                            // Adicione outros valores conforme necessário
                        ];
                        }
                        /* Ocultação da senha */
                        $senha = $user_data['senha'];
                        $qtd_asteriscos = strlen($senha);
                        $senha_oculta = str_repeat("*", $qtd_asteriscos);
                        
                        echo "<div class='selectBox'><span>Nome: ".$user_data['nome']."</span>&nbsp</div>";
                        echo "<div class='selectBox'><span>Celular: ".$celular."</span>&nbsp</div>";
                        echo "<div class='selectBox'><span>Email: ".$user_data['email']."</span>&nbsp</div>";

                        echo "<div class='selectBox'><div class='editasenha'>";
                        echo "<span id='senha_oculta'>Senha: " . $senha_oculta . "</span>";
                        echo "<a onclick='exibirSenha()' id='toggleImg'><img id='image' src='../img/lock-a.png' alt=''></a>";
                        echo "<a href='./editarsenha.php?id=$user_data[id]''><img src='../img/password.png' alt=''></a>";
                        echo "</div></div>";
                        echo "<script>
                                var senha = document.getElementById('senha_oculta');
                                var toggleImg = document.getElementById('toggleImg');
                                var image = document.getElementById('image');

                                toggleImg.addEventListener('click', function() {
                                if (image.src.includes('img/lock-a.png')) {
                                    image.src = '../img/lock-b.png';
                                    senha.innerText = 'Senha: " . $senha . "';
                                } else {
                                    image.src = '../img/lock-a.png';
                                    senha.innerText = 'Senha: " . $senha_oculta . "';
                                }
                                });
                            </script>";
                        echo "<div class='selectBox'><span>Estado: ".$user_data['estado']."</span>&nbsp</div>";
                        echo "<div class='selectBox'><span>Cidade: ".$user_data['cidade']."</span>&nbsp</div>";
                        echo "<div class='selectBox'><span>Endereço: ".$user_data['endereco']."</span>&nbsp</div>";
                        echo "<hr>";
                        echo "<div class='selectBox'><span>Dojo: ".$user_data['dojo']."</span>&nbsp</div>";
                        echo "<div class='selectBox'><span>Sensei: ".$user_data['sensei']."</span>&nbsp</div>";
                        echo "<div class='selectBox'><span>Kyu: ". $kyu_info[$kyu] ."</span>&nbsp</div>";
                        echo "<hr>";
                        echo "<div class='selectBox'><span>Renovação: ".$user_data['ativacao']."</span>&nbsp</div>";
                        echo "<div class='selectBox'><span>Expiração: ".$user_data['expiracao']."</span>&nbsp</div>";
                    }
                    ?>

                </div>
            </div>
        </nav>

        <nav class="navy">
            <div class="item">
                <input type="checkbox" id="check2">
                <label for="check2">Primeiros Socorros<img src="../img/emergencia.png" alt="Icone usuário"></label>
                <div class="perfil">

                    <?php
                    if($_SESSION['id']) {
                        $data = $_SESSION['id'];
                        $sql = "SELECT * FROM emergencia WHERE id LIKE '%$data%'";
                    }
                    $result2 = $conexao->query($sql);
                    if($user_data = mysqli_fetch_assoc($result2)) {

                        /* Formatação do celular Contato 1 */
                        $telefone1 = $user_data['telefone1'];
                        $codigo_area = substr($telefone1, 0, 2);
                        $primeira_parte = substr($telefone1, 2, 5);
                        $segunda_parte = substr($telefone1, 7, 4);
                        $celular1 = "(" . $codigo_area . ")" . $primeira_parte . "-" . $segunda_parte;
                        /* Formatação do celular Contato 2 */
                        $telefone2 = $user_data['telefone2'];
                        $codigo_area = substr($telefone2, 0, 2);
                        $primeira_parte = substr($telefone2, 2, 5);
                        $segunda_parte = substr($telefone2, 7, 4);
                        $celular2 = "(" . $codigo_area . ")" . $primeira_parte . "-" . $segunda_parte;
                        /* Formatação do celular Contato 3 */
                        $telefone3 = $user_data['telefone3'];
                        $codigo_area = substr($telefone3, 0, 2);
                        $primeira_parte = substr($telefone3, 2, 5);
                        $segunda_parte = substr($telefone3, 7, 4);
                        $celular3 = "(" . $codigo_area . ")" . $primeira_parte . "-" . $segunda_parte;
                        echo "<div class='selectBox'><span>1º Contato: ".$user_data['contato1']."</span>&nbsp</div>";
                        echo "<div class='selectBox'><span>Celular: ".$celular1."</span>&nbsp</div>";
                        echo "<div class='selectBox'><span>2º Contato: ".$user_data['contato2']."</span>&nbsp</div>";
                        echo "<div class='selectBox'><span>Celular: ".$celular2."</span>&nbsp</div>";
                        echo "<div class='selectBox'><span>3º Contato: ".$user_data['contato3']."</span>&nbsp</div>";
                        echo "<div class='selectBox'><span>Celular: ".$celular3."</span>&nbsp</div>";
                        echo "<hr>";
                        echo "<div class='selectBox'><span>Alergia: ".$user_data['alergia']."</span>&nbsp</div>";
                        echo "<div class='selectBox'><span>Remédio: ".$user_data['remedio']."</span>&nbsp</div>";
                        echo "<div class='selectBox'><span>Deficiência: ".$user_data['deficiencia']."</span>&nbsp</div>";
                        echo "<div class='selectBox'><span>Hospital: ".$user_data['hospital']."</span>&nbsp</div>";
                    }
                    ?>

                </div>
            </div>
        </nav>

        <nav class="navy">
            <div class="item">
                <input type="checkbox" id="check3">
                <label for="check3">Graduações de Kyu<img src="../img/kimono-perfil.png" alt="Icone usuário"></label>
                    <div class="perfil">
                    
                    <?php
                    if($_SESSION['id']) {
                        $data = $_SESSION['id'];
                        $sql = "SELECT * FROM graduacao WHERE id LIKE '%$data%'";
                    }
                    $result3 = $conexao->query($sql);
                    if($user_data = mysqli_fetch_assoc($result3)) {
                        $datakyu10 = new DateTime($user_data['kyu10']);
                        $datakyu9 = new DateTime($user_data['kyu9']);
                        $intervalokyu10 = $datakyu10->diff($datakyu9);
                        $ano = $intervalokyu10->format('%y');
                        $meses = $intervalokyu10->format('%m');
                        $dias = $intervalokyu10->format('%d');
                        echo "<div class='selectBox'><span>10° Kyu: " . $user_data['kyu10'] . "&nbsp Praticou por: " . $ano . " anos, " . $meses . " meses e " . $dias . " dias .</span></div>";

                        $datakyu9 = new DateTime($user_data['kyu9']);
                        $datakyu8 = new DateTime($user_data['kyu8']);
                        $intervalokyu9 = $datakyu9->diff($datakyu8);
                        $ano = $intervalokyu9->format('%y');
                        $meses = $intervalokyu9->format('%m');
                        $dias = $intervalokyu9->format('%d');
                        echo "<div class='selectBox'><span>&nbsp 9° Kyu: " . $user_data['kyu9'] . "&nbsp Praticou por: " . $ano . " anos, " . $meses . " meses e " . $dias . " dias .</span></div>";

                        $datakyu8 = new DateTime($user_data['kyu8']);
                        $datakyu7 = new DateTime($user_data['kyu7']);
                        $intervalokyu8 = $datakyu8->diff($datakyu7);
                        $ano = $intervalokyu8->format('%y');
                        $meses = $intervalokyu8->format('%m');
                        $dias = $intervalokyu8->format('%d');
                        echo "<div class='selectBox'><span>&nbsp 8° Kyu: " . $user_data['kyu8'] . "&nbsp Praticou por: " . $ano . " anos, " . $meses . " meses e " . $dias . " dias .</span></div>";

                        $datakyu7 = new DateTime($user_data['kyu7']);
                        $datakyu6 = new DateTime($user_data['kyu6']);
                        $intervalokyu7 = $datakyu7->diff($datakyu6);
                        $ano = $intervalokyu7->format('%y');
                        $meses = $intervalokyu7->format('%m');
                        $dias = $intervalokyu7->format('%d');
                        echo "<div class='selectBox'><span>&nbsp 7° Kyu: " . $user_data['kyu7'] . "&nbsp Praticou por: " . $ano . " anos, " . $meses . " meses e " . $dias . " dias .</span></div>";

                        $datakyu6 = new DateTime($user_data['kyu6']);
                        $datakyu5 = new DateTime($user_data['kyu5']);
                        $intervalokyu6 = $datakyu6->diff($datakyu5);
                        $ano = $intervalokyu6->format('%y');
                        $meses = $intervalokyu6->format('%m');
                        $dias = $intervalokyu6->format('%d');
                        echo "<div class='selectBox'><span>&nbsp 6° Kyu: " . $user_data['kyu6'] . "&nbsp Praticou por: " . $ano . " anos, " . $meses . " meses e " . $dias . " dias .</span></div>";

                        $datakyu5 = new DateTime($user_data['kyu5']);
                        $datakyu4 = new DateTime($user_data['kyu4']);
                        $intervalokyu5 = $datakyu5->diff($datakyu4);
                        $ano = $intervalokyu5->format('%y');
                        $meses = $intervalokyu5->format('%m');
                        $dias = $intervalokyu5->format('%d');
                        echo "<div class='selectBox'><span>&nbsp 5° Kyu: " . $user_data['kyu5'] . "&nbsp Praticou por: " . $ano . " anos, " . $meses . " meses e " . $dias . " dias .</span></div>";

                        $datakyu4 = new DateTime($user_data['kyu4']);
                        $datakyu3 = new DateTime($user_data['kyu3']);
                        $intervalokyu4 = $datakyu4->diff($datakyu3);
                        $ano = $intervalokyu4->format('%y');
                        $meses = $intervalokyu4->format('%m');
                        $dias = $intervalokyu4->format('%d');
                        echo "<div class='selectBox'><span>&nbsp 4° Kyu: " . $user_data['kyu4'] . "&nbsp Praticou por: " . $ano . " anos, " . $meses . " meses e " . $dias . " dias .</span></div>";

                        $datakyu3 = new DateTime($user_data['kyu3']);
                        $datakyu2 = new DateTime($user_data['kyu2']);
                        $intervalokyu3 = $datakyu3->diff($datakyu2);
                        $ano = $intervalokyu3->format('%y');
                        $meses = $intervalokyu3->format('%m');
                        $dias = $intervalokyu3->format('%d');
                        echo "<div class='selectBox'><span>&nbsp 3° Kyu: " . $user_data['kyu3'] . "&nbsp Praticou por: " . $ano . " anos, " . $meses . " meses e " . $dias . " dias .</span></div>";

                        $datakyu2 = new DateTime($user_data['kyu2']);
                        $datakyu1 = new DateTime($user_data['kyu1']);
                        $intervalokyu2 = $datakyu2->diff($datakyu1);
                        $ano = $intervalokyu2->format('%y');
                        $meses = $intervalokyu2->format('%m');
                        $dias = $intervalokyu2->format('%d');
                        echo "<div class='selectBox'><span>&nbsp 2° Kyu: " . $user_data['kyu2'] . "&nbsp Praticou por: " . $ano . " anos, " . $meses . " meses e " . $dias . " dias .</span></div>";

                        $datakyu1 = new DateTime($user_data['kyu1']);
                        $dataDan1 = new DateTime($user_data['dan1']);
                        $intervalokyu1 = $datakyu1->diff($dataDan1);
                        $ano = $intervalokyu1->format('%y');
                        $meses = $intervalokyu1->format('%m');
                        $dias = $intervalokyu1->format('%d');
                        echo "<div class='selectBox'><span>&nbsp 1° Kyu: " . $user_data['kyu1'] . "&nbsp Praticou por: " . $ano . " anos, " . $meses . " meses e " . $dias . " dias .</span></div>";
                    }
                    ?>
                    </div>
            </div>
        </nav>


         <?php
            if ($_SESSION['kyu'] < 10) {
                echo '<style>.pro1 { display: none; }</style>';
            }
        ?>
        <nav class="navy pro1">
            <div class="item">
                <input type="checkbox" id="check4">
                <label for="check4">Graduações de Dan<img src="../img/kimono-perfil.png" alt="Icone usuário"></label>
                    <div class="perfil">
                    
                    <?php
                    if($_SESSION['id']) {
                        $data = $_SESSION['id'];
                        $sql = "SELECT * FROM graduacao WHERE id LIKE '%$data%'";
                    }
                    $result4 = $conexao->query($sql);
                    if($user_data = mysqli_fetch_assoc($result4)) {
                        $datakyu1 = new DateTime($user_data['kyu1']);
                        $datadan1 = new DateTime($user_data['dan1']);
                        $intervalokyu1 = $datakyu1->diff($datadan1);
                        $ano = $intervalokyu1->format('%y');
                        $meses = $intervalokyu1->format('%m');
                        $dias = $intervalokyu1->format('%d');
                        echo "<div class='selectBox'><span>&nbsp 1° Dan: " . $user_data['dan1'] . "&nbsp Praticou por: " . $ano . " anos, " . $meses . " meses e " . $dias . " dias .</span></div>";

                        $datadan1 = new DateTime($user_data['dan1']);
                        $datadan2 = new DateTime($user_data['dan2']);
                        $intervalodan1 = $datadan1->diff($datadan2);
                        $ano = $intervalodan1->format('%y');
                        $meses = $intervalodan1->format('%m');
                        $dias = $intervalodan1->format('%d');
                        echo "<div class='selectBox'><span>&nbsp 2° Dan: " . $user_data['dan2'] . "&nbsp Praticou por: " . $ano . " anos, " . $meses . " meses e " . $dias . " dias .</span></div>";

                        $datadan2 = new DateTime($user_data['dan2']);
                        $datadan3 = new DateTime($user_data['dan3']);
                        $intervalodan2 = $datadan2->diff($datadan3);
                        $ano = $intervalodan2->format('%y');
                        $meses = $intervalodan2->format('%m');
                        $dias = $intervalodan2->format('%d');
                        echo "<div class='selectBox'><span>&nbsp 3° Dan: " . $user_data['dan3'] . "&nbsp Praticou por: " . $ano . " anos, " . $meses . " meses e " . $dias . " dias .</span></div>";

                        $datadan3 = new DateTime($user_data['dan3']);
                        $datadan4 = new DateTime($user_data['dan4']);
                        $intervalodan3 = $datadan3->diff($datadan4);
                        $ano = $intervalodan3->format('%y');
                        $meses = $intervalodan3->format('%m');
                        $dias = $intervalodan3->format('%d');
                        echo "<div class='selectBox'><span>&nbsp 4° Dan: " . $user_data['dan4'] . "&nbsp Praticou por: " . $ano . " anos, " . $meses . " meses e " . $dias . " dias .</span></div>";

                        $datadan4 = new DateTime($user_data['dan4']);
                        $datadan5 = new DateTime($user_data['dan5']);
                        $intervalodan4 = $datadan4->diff($datadan5);
                        $ano = $intervalodan4->format('%y');
                        $meses = $intervalodan4->format('%m');
                        $dias = $intervalodan4->format('%d');
                        echo "<div class='selectBox'><span>&nbsp 5° Dan: " . $user_data['dan5'] . "&nbsp Praticou por: " . $ano . " anos, " . $meses . " meses e " . $dias . " dias .</span></div>";

                        $datadan5 = new DateTime($user_data['dan5']);
                        $datadan6 = new DateTime($user_data['dan6']);
                        $intervalodan5 = $datadan5->diff($datadan6);
                        $ano = $intervalodan5->format('%y');
                        $meses = $intervalodan5->format('%m');
                        $dias = $intervalodan5->format('%d');
                        echo "<div class='selectBox'><span>&nbsp 6° Dan: " . $user_data['dan6'] . "&nbsp Praticou por: " . $ano . " anos, " . $meses . " meses e " . $dias . " dias .</span></div>";

                        $datadan6 = new DateTime($user_data['dan6']);
                        $datadan7 = new DateTime($user_data['dan7']);
                        $intervalodan6 = $datadan6->diff($datadan7);
                        $ano = $intervalodan6->format('%y');
                        $meses = $intervalodan6->format('%m');
                        $dias = $intervalodan6->format('%d');
                        echo "<div class='selectBox'><span>&nbsp 7° Dan: " . $user_data['dan7'] . "&nbsp Praticou por: " . $ano . " anos, " . $meses . " meses e " . $dias . " dias .</span></div>";

                        $datadan7 = new DateTime($user_data['dan7']);
                        $datadan8 = new DateTime($user_data['dan8']);
                        $intervalodan7 = $datadan7->diff($datadan8);
                        $ano = $intervalodan7->format('%y');
                        $meses = $intervalodan7->format('%m');
                        $dias = $intervalodan7->format('%d');
                        echo "<div class='selectBox'><span>&nbsp 8° Dan: " . $user_data['dan8'] . "&nbsp Praticou por: " . $ano . " anos, " . $meses . " meses e " . $dias . " dias .</span></div>";

                        $datadan8 = new DateTime($user_data['dan8']);
                        $datadan9 = new DateTime($user_data['dan9']);
                        $intervalodan8 = $datadan8->diff($datadan9);
                        $ano = $intervalodan8->format('%y');
                        $meses = $intervalodan8->format('%m');
                        $dias = $intervalodan8->format('%d');
                        echo "<div class='selectBox'><span>&nbsp 9° Dan: " . $user_data['dan9'] . "&nbsp Praticou por: " . $ano . " anos, " . $meses . " meses e " . $dias . " dias .</span></div>";

                        $datadan9 = new DateTime($user_data['dan9']);
                        $datadan10 = new DateTime($user_data['dan10']);
                        $intervalodan9 = $datadan9->diff($datadan10);
                        $ano = $intervalodan9->format('%y');
                        $meses = $intervalodan9->format('%m');
                        $dias = $intervalodan9->format('%d');
                        echo "<div class='selectBox'><span>10° Dan: " . $user_data['dan10'] . "&nbsp Praticou por: " . $ano . " anos, " . $meses . " meses e " . $dias . " dias .</span></div>";

                        $datadan10 = new DateTime($user_data['dan10']);
                        $datadan11 = new DateTime($user_data['dan11']);
                        $intervalodan10 = $datadan10->diff($datadan11);
                        $ano = $intervalodan10->format('%y');
                        $meses = $intervalodan10->format('%m');
                        $dias = $intervalodan10->format('%d');
                        echo "<div class='selectBox'><span>11° Dan: " . $user_data['dan11'] . "&nbsp Praticou por: " . $ano . " anos, " . $meses . " meses e " . $dias . " dias .</span></div>";

                        $datadan11 = new DateTime($user_data['dan11']);
                        $datadan12 = new DateTime($user_data['dan12']);
                        $intervalodan11 = $datadan11->diff($datadan12);
                        $ano = $intervalodan11->format('%y');
                        $meses = $intervalodan11->format('%m');
                        $dias = $intervalodan11->format('%d');
                        echo "<div class='selectBox'><span>12° Dan: " . $user_data['dan12'] . "&nbsp Praticou por: " . $ano . " anos, " . $meses . " meses e " . $dias . " dias .</span></div>";

                        $datadan12 = new DateTime($user_data['dan12']);
                        $datadan13 = new DateTime($user_data['dan13']);
                        $intervalodan12 = $datadan12->diff($datadan13);
                        $ano = $intervalodan12->format('%y');
                        $meses = $intervalodan12->format('%m');
                        $dias = $intervalodan12->format('%d');
                        echo "<div class='selectBox'><span>13° Dan: " . $user_data['dan13'] . "&nbsp Praticou por: " . $ano . " anos, " . $meses . " meses e " . $dias . " dias .</span></div>";

                        $datadan13 = new DateTime($user_data['dan13']);
                        $datadan14 = new DateTime($user_data['dan14']);
                        $intervalodan13 = $datadan13->diff($datadan14);
                        $ano = $intervalodan13->format('%y');
                        $meses = $intervalodan13->format('%m');
                        $dias = $intervalodan13->format('%d');
                        echo "<div class='selectBox'><span>14° Dan: " . $user_data['dan14'] . "&nbsp Praticou por: " . $ano . " anos, " . $meses . " meses e " . $dias . " dias .</span></div>";

                        $datadan14 = new DateTime($user_data['dan14']);
                        $datadan15 = new DateTime($user_data['dan15']);
                        $intervalodan14 = $datadan14->diff($datadan15);
                        $ano = $intervalodan14->format('%y');
                        $meses = $intervalodan14->format('%m');
                        $dias = $intervalodan14->format('%d');
                        echo "<div class='selectBox'><span>15° Dan: " . $user_data['dan15'] . "&nbsp Praticou por: " . $ano . " anos, " . $meses . " meses e " . $dias . " dias .</span></div>";

                    }
                    ?>
                    </div>
            </div>
        </nav>

        <nav class="navy">
    <div class="item">
        <input type="checkbox" id="check5">
        <label for="check5">Mensalidades<img src="../img/fatura.png" alt="fatura"></label>
        <div class="perfil">

            <?php
            if (isset($_SESSION['id'])) {
                $data = $_SESSION['id'];
                $sql = "SELECT * FROM financa WHERE alunos_id = '$data' AND tipo = '1' ORDER BY anos DESC, meses DESC, diadata DESC";
                $result5 = $conexao->query($sql);

                $pagamentos = [];

                // Carregar todos os pagamentos do aluno
                while ($user_data = mysqli_fetch_assoc($result5)) {
                    $mes = (int)$user_data['meses'];
                    $ano = (int)$user_data['anos'];
                    $pagamentos[$ano][$mes][] = $user_data;
                }

                // Exibir o último pagamento no topo
                $primeiro_pagamento = true;
                foreach ($pagamentos as $ano => $meses) {
                    foreach ($meses as $mes => $pagamentos_mes) {
                        foreach ($pagamentos_mes as $pagamento) {
                            echo "<div class='selectBox'><span><a>" . number_format($pagamento['valor'], 2, ',', '.') . "</a>&nbsp- " . $pagamento['diadata'] . " - " . obterNomeMes($pagamento['meses']) . " - " . $pagamento['anos'] . "</span></div>";
                        }
                    }
                }
            }

            // Função para obter o nome do mês em português
            function obterNomeMes($mes) {
                $meses = array(
                    1 => 'Janeiro',
                    2 => 'Fevereiro',
                    3 => 'Março',
                    4 => 'Abril',
                    5 => 'Maio',
                    6 => 'Junho',
                    7 => 'Julho',
                    8 => 'Agosto',
                    9 => 'Setembro',
                    10 => 'Outubro',
                    11 => 'Novembro',
                    12 => 'Dezembro'
                );
                return $meses[$mes];
            }
            ?>

        </div>
    </div>
</nav>




            </div> <!-- class="spacex" -->
        </section>
        <?php 
            $footer_class='footer';
            include_once('../views/footer.php');
        ?>
        <script src="../js/accordion.js"></script>
        <script src="../js/menubar.js"></script>
    </body>
</html>