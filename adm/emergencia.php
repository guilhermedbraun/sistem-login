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
                $sqlSelect = "SELECT * FROM emergencia WHERE id=$id";
                $result = $conexao->query($sqlSelect);
                if($result->num_rows > 0)
                {
                    while($user_data = mysqli_fetch_assoc($result))
                    {
                        $contato1 = $user_data['contato1'];
                        $telefone1 = $user_data['telefone1'];
                        $contato2 = $user_data['contato2'];
                        $telefone2 = $user_data['telefone2'];
                        $contato3 = $user_data['contato3'];
                        $telefone3 = $user_data['telefone3'];
                        $alergia = $user_data['alergia'];
                        $remedio = $user_data['remedio'];
                        $deficiencia = $user_data['deficiencia'];
                        $hospital = $user_data['hospital'];
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

    require_once('../views/header.php');
    require_once('../views/nav.php');
    require_once('../views/sidebar.php');
?>
    <section class="pection">

        <div class="box">
            <form action="../system/savemedic.php" method="POST">
                <legend>Ficha Médica</legend>
                    <div class="formflex">
                        <div class="formColA">

                            <div class="containec">

                                <div class="input-fielc">
                                <i class='bx bx-user' ></i>
                                <input type="text" class="input" placeholder="Nome 1" name="contato1" id="contato1" value="<?php echo $contato1; ?>" maxlength="50">
                                </div>

                                <div class="input-fielc">
                                <i class='bx bx-mobile'></i>
                                <input type="tel" class="input" placeholder="Telefone 1" name="telefone1" id="telefone1" value="<?php echo $telefone1; ?>" maxlength="11">
                                </div>
                                
                                <div class="input-fielc">
                                <i class='bx bx-user' ></i>
                                <input type="text" class="input" placeholder="Nome 2" name="contato2" id="contato2" value="<?php echo $contato2; ?>" maxlength="50">
                                </div>

                                <div class="input-fielc">
                                <i class='bx bx-mobile'></i>
                                <input type="tel" class="input" placeholder="Telefone 2" name="telefone2" id="telefone2" value="<?php echo $telefone2; ?>" maxlength="11">
                                </div>
                                
                                <div class="input-fielc">
                                <i class='bx bx-user' ></i>
                                <input type="text" class="input" placeholder="Nome 3" name="contato3" id="contato3" value="<?php echo $contato3; ?>" maxlength="50">
                                </div>

                                <div class="input-fielc">
                                <i class='bx bx-mobile'></i>
                                <input type="tel" class="input" placeholder="Telefone 3" name="telefone3" id="telefone3" value="<?php echo $telefone3; ?>" maxlength="11">
                                </div>

                            </div>
                        </div>
                        <div class="formColB">
                            <div class="containec">

                                <div class="input-fielc">
                                <i class='bx bx-capsule'></i>
                                <input type="text" class="input" placeholder="Alergia ?" name="alergia" id="alergia" value="<?php echo $alergia; ?>" maxlength="500">
                                </div>

                                <div class="input-fielc">
                                <i class='bx bx-capsule'></i>
                                <input type="text" class="input" placeholder="Remédio ?" name="remedio" id="remedio" value="<?php echo $remedio; ?>" maxlength="500">
                                </div>

                                <div class="input-fielc">
                                <i class='bx bx-handicap'></i>
                                <input type="text" class="input" placeholder="Deficiência ?" name="deficiencia" id="deficiencia" value="<?php echo $deficiencia; ?>" maxlength="500">
                                </div>

                                <div class="input-fielc">
                                <i class='bx bx-building-house'></i>
                                <input type="text" class="input" placeholder="Hospital ?" name="hospital" id="hospital" value="<?php echo $hospital; ?>" maxlength="500">
                                </div>

                                <br>

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