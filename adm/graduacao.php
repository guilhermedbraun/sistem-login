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
                $sqlSelect = "SELECT * FROM graduacao WHERE id=$id";
                $result = $conexao->query($sqlSelect);
                if ($result->num_rows > 0)
                {
                    while ($user_data = mysqli_fetch_assoc($result))
                    {
                        $kyu10 = $user_data['kyu10'];
                        $kyu9 = $user_data['kyu9'];
                        $kyu8 = $user_data['kyu8'];
                        $kyu7 = $user_data['kyu7'];
                        $kyu6 = $user_data['kyu6'];
                        $kyu5 = $user_data['kyu5'];
                        $kyu4 = $user_data['kyu4'];
                        $kyu3 = $user_data['kyu3'];
                        $kyu2 = $user_data['kyu2'];
                        $kyu1 = $user_data['kyu1'];
                        $dan1 = $user_data['dan1'];
                        $dan2 = $user_data['dan2'];
                        $dan3 = $user_data['dan3'];
                        $dan4 = $user_data['dan4'];
                        $dan5 = $user_data['dan5'];
                        $dan6 = $user_data['dan6'];
                        $dan7 = $user_data['dan7'];
                        $dan8 = $user_data['dan8'];
                        $dan9 = $user_data['dan9'];
                        $dan10 = $user_data['dan10'];
                        $dan11 = $user_data['dan11'];
                        $dan12 = $user_data['dan12'];
                        $dan13 = $user_data['dan13'];
                        $dan14 = $user_data['dan14'];
                        $dan15 = $user_data['dan15'];
                    }
                }
                else
                {
                    header('Location: index.php');
                }
            }
            else
            {
                header('Location: index.php');
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

                <div class="painelGrad">

                    <div class="kyuX">
                        <div class="gradXpainel">
                        <?php
    
                            if(isset($_POST['submik'])) {
                                $selectedKyu = $_POST['kyug'];
                                $selectedDate = $_POST['data_nask'];
                                $id = $_POST['id'];

                                $selectedDate = date('Y-m-d', strtotime($selectedDate));

                                $allowedKyus = ["kyu10", "kyu9", "kyu8", "kyu7", "kyu6", "kyu5", "kyu4", "kyu3", "kyu2", "kyu1"];
                                
                                if (!in_array($selectedKyu, $allowedKyus)) {
                                    die("Valor inválido para Kyu");
                                }

                                $updateSql = "UPDATE graduacao SET $selectedKyu = '$selectedDate' WHERE id = $id";

                                if ($conexao->query($updateSql) === TRUE) {
                                    echo "
                                    <div class='msg_sucesso'>
                                    Data salva com sucesso!
                                    </div>";
                                    echo "
                                        <script>
                                            setTimeout(function() {
                                                window.location.href = 'graduacao.php?id=$id';
                                            }, 3000);
                                        </script>";
                                } else {
                                    echo "
                                    <div class='msg_erro'>
                                    Erro ao salvar data!
                                    </div>" . $conexao->error;
                                    echo "
                                        <script>
                                            setTimeout(function() {
                                                window.location.href = 'index.php?id=$id';
                                            }, 3000);
                                        </script>";
                                }
                            }

                        ?>
                            <h3>Kyu</h3>
                            <form method="post">

                                <div class="seletor">
                                    <div class="select">
                                        <select id="kyug" name="kyug" required>
                                            <option value=""selected disabled id="disabled">???</option>
                                            <option value="kyu10">10° Kyu</option>
                                            <option value="kyu9">09° Kyu</option>
                                            <option value="kyu8">08° Kyu</option>
                                            <option value="kyu7">07° Kyu</option>
                                            <option value="kyu6">06° Kyu</option>
                                            <option value="kyu5">05° Kyu</option>
                                            <option value="kyu4">04° Kyu</option>
                                            <option value="kyu3">03° Kyu</option>
                                            <option value="kyu2">02° Kyu</option>
                                            <option value="kyu1">01° Kyu</option>
                                        </select>
                                    </div>
                                    <div class="ano">
                                        <input type="date" name="data_nask" id="data_nasc" required>
                                    </div>
                                </div>

                                <div class="input-field">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="submit" name="submik" class="submit" value="Salvar">
                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="danX">
                        <div class="gradXpainel">
                        <?php
    
                            if(isset($_POST['submid'])) {
                                $selectedDan = $_POST['dang'];
                                $selectedDate = $_POST['data_nasd'];
                                $id = $_POST['id'];

                                $selectedDate = date('Y-m-d', strtotime($selectedDate));

                                $allowedDans = ["dan1", "dan2", "dan3", "dan4", "dan5", "dan6", "dan7", "dan8", "dan9", "dan10", "dan11", "dan12", "dan13", "dan14", "dan15"];
                                
                                if (!in_array($selectedDan, $allowedDans)) {
                                    die("Valor inválido para Kyu");
                                }

                                $updateSqli = "UPDATE graduacao SET $selectedDan = '$selectedDate' WHERE id = $id";

                                if ($conexao->query($updateSqli) === TRUE) {
                                    echo "
                                    <div class='msg_sucesso'>
                                    Data salva com sucesso!
                                    </div>";
                                    echo "
                                        <script>
                                            setTimeout(function() {
                                                window.location.href = 'graduacao.php?id=$id';
                                            }, 3000);
                                        </script>";
                                } else {
                                    echo "
                                    <div class='msg_erro'>
                                    Erro ao salvar data!
                                    </div>" . $conexao->error;
                                    echo "
                                        <script>
                                            setTimeout(function() {
                                                window.location.href = 'index.php?id=$id';
                                            }, 3000);
                                        </script>";
                                }
                            }

                        ?>
                            <h3>Dan</h3>
                            <form method="post">
                            
                                <div class="seletor">
                                    <div class="select">
                                        <select id="dang" name="dang" required>
                                            <option value=""selected disabled id="disabled">???</option>
                                            <option value="dan1">01° Dan</option>
                                            <option value="dan2">02° Dan</option>
                                            <option value="dan3">03° Dan</option>
                                            <option value="dan4">04° Dan</option>
                                            <option value="dan5">05° Dan</option>
                                            <option value="dan6">06° Dan</option>
                                            <option value="dan7">07° Dan</option>
                                            <option value="dan8">08° Dan</option>
                                            <option value="dan9">09° Dan</option>
                                            <option value="dan10">10° Dan</option>
                                            <option value="dan11">11° Dan</option>
                                            <option value="dan12">12° Dan</option>
                                            <option value="dan13">13° Dan</option>
                                            <option value="dan14">14° Dan</option>
                                            <option value="dan15">15° Dan</option>
                                        </select>
                                    </div>
                                    <div class="ano">
                                        <input type="date" name="data_nasd" id="data_nasc" required>
                                    </div>
                                </div>

                                <div class="input-field">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="submit" name="submid" class="submit" value="Salvar">
                                </div>

                            </form>
                        </div>
                    </div>

                </div>


        <nav class="navy">
            <div class="item">
                <input type="checkbox" id="check1">
                <label for="check1">Graduações de Kyu<img src='../img/kimono.png'></a></label>
                <div class="perfil">
                    
                    <?php
                    if($_GET['id']) {
                        $data = $_GET['id'];
                        $sql = "SELECT * FROM graduacao WHERE id LIKE '%$data%'";
                    }
                    $result = $conexao->query($sql);
                    if($user_data = mysqli_fetch_assoc($result)) {

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
        <nav class="navy">
            <div class="item">
                <input type="checkbox" id="check2">
                <label for="check2">Graduações de Dan<img src='../img/kimono.png'></a></label>
                <div class="perfil">
                  
                <?php
                    if($_GET['id']) {
                        $data = $_GET['id'];
                        $sqli = "SELECT * FROM graduacao WHERE id LIKE '%$data%'";
                    }
                    $resulta = $conexao->query($sqli);
                    if($user_data = mysqli_fetch_assoc($resulta)) {

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

        </section>
        <?php 
            $footer_class='footer';
            include_once('../views/footer.php');
        ?>
        <script src="../js/menubar.js"></script>
        <script src="../js/accordion.js"></script>
        <script src="../js/sidebar.js"></script>
    </body>
</html>