<?php
    session_start();
    include_once('../system/config.php');
    include_once('../system/timeout.php');

//    print_r($_SESSION);// retirar
    
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['id']);
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset($_SESSION['adm']);
        unset($_SESSION['kyu']);
        unset($_SESSION['ativo']);
        header('Location: ../index.php');
    }
    elseif($_SESSION['ativo'] > 0)
    {
        $logado = $_SESSION['adm'] ==  0 || 1;
        if($_SESSION['adm'] > 1)
        {
            header('Location: ../aulas/index.php');
        }
        elseif(!empty($_GET['search']))
        {
            $data = $_GET['search'];
            $sqli = "SELECT * FROM financa WHERE nome LIKE '%$data%' or descricao LIKE '%$data%' or valor LIKE '%$data%' or tipo LIKE '%$data%' or diadata LIKE '%$data%' ORDER BY id ASC";
        }
        else
        {
            $sqli = "SELECT * FROM financa ORDER BY id DESC";
        }
        $resultaf = $conexao->query($sqli);

        // Obter os dados dos alunos para o select
        $sqlAlunos = "SELECT id, nome FROM alunos";
        $resultAlunos = $conexao->query($sqlAlunos);
    }
    else
    {
        header('Location: ../checkout/index.php');
    }
    
    require_once('../views/header.php');
    require_once('../views/nav.php');
    require_once('../views/sidebar.php');
?>
        <section class="pection">

            <div class="painel">

                <div class="admX">
                    <div class="admXpainel">
                        <h3>Entradas:</h3>
                            <?php
                            // Obter o mês e o ano atuais
                            $mes_atual = date('n'); // 'n' retorna o mês sem zero à esquerda
                            $ano_atual = date('Y');
                            
                            // SQL para somar os valores das entradas do mês atual
                            $sql1 = "SELECT SUM(valor) AS totalEntrada 
                                    FROM financa 
                                    WHERE tipo = '1' 
                                    AND valor > 0 
                                    AND meses = '$mes_atual' 
                                    AND anos = '$ano_atual'";
                            
                            $result = $conexao->query($sql1);
                            $row = $result->fetch_assoc();
                            $totalEntrada = $row['totalEntrada'];
                            ?>
                            <h4>Total: R$ <?php echo number_format($totalEntrada, 2, ',', '.'); ?></h4>
                    </div>
                    <img src="../img/entrada-dollar.png" alt="adm">
                </div>

                <div class="alunosX">
                    <div class="alunosXpainel">
                        <h3>Saídas:</h3>
                            <?php
                            $sql2 = "SELECT SUM(valor) AS totalSaida 
                                    FROM financa 
                                    WHERE tipo = '2' 
                                    AND valor > 0 
                                    AND meses = '$mes_atual' 
                                    AND anos = '$ano_atual'";
                            
                            $result = $conexao->query($sql2);
                            $row = $result->fetch_assoc();
                            $totalSaida = $row['totalSaida'];
                            ?>
                        <h4>Total: R$ <?php echo number_format($totalSaida, 2, ',', '.'); ?></h4>
                    </div>
                    <img src="../img/saida-dollar.png" alt="alunos">
                </div>

                <div class="ativosX">
                    <div class="ativosXpainel">
                        <h3>Total:</h3>
                        <?php
                        $total = $totalEntrada - $totalSaida;
                        ?>
                        <h4>Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></h4>
                    </div>
                    <img src="../img/total-dollar.png" alt="ativos">
                </div>

            </div>

                <form action="./save.php" method="POST">
                    <div class="novaEntrada">
                        <div class="input-fielf">
                            <i class='bx bx-user'></i>
                            <select id="alunos_id" name="alunos_id" required>
                                <option value="" selected disabled>Selecione o aluno</option>
                                <?php
                                while ($aluno = $resultAlunos->fetch_assoc()) {
                                    echo "<option value='" . $aluno['id'] . "'>" . $aluno['nome'] . "</option>";
                                }
                                ?>
                            </select>
                            <input type="hidden" id="nome" name="nome" value="">
                        </div>
                        <div class="input-fielf">
                            <i class='bx bx-pen'></i>
                            <input type="text" class="input" placeholder="Descrição" name="descricao" id="descricao" maxlength="100" required>
                        </div>
                        <div class="input-fielf">
                            <i class='bx bx-dollar'></i>
                            <input type="number" class="input" placeholder="Valor" name="valor" id="valor" maxlength="10" required>
                        </div>
                        <div class="input-fielf">
                            <i class='bx bx-down-arrow-alt'></i>
                            <select id="tipo" name="tipo" required>
                                <option value="1">Entrada</option>
                                <option value="2">Saída</option>
                            </select>
                        </div>
                        <div class="input-fielf">
                            <input type="submit" name="submit" class="submif" value="Salvar">
                        </div>
                    </div>
                </form>

                <div class="search" id="lupa">
                    <input type="search" class="box-search" placeholder="Pesquisar" id="pesquisar">
                    <button onclick="searchData()" class="btn-pesquisar"></button>
                </div>

                <div class="scope">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"><a>Nome</a></th>
                                <th scope="col"><a>Descrição</a></th>
                                <th scope="col"><a>Valor</a></th>
                                <th scope="col"><a>Tipo</a></th>
                                <th scope="col"><a>Dia</a></th>
                                <th scope="col"><a>Mês</a></th>
                                <th scope="col"><a>Ano</a></th>
                                <th scope="col">Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($user_data = mysqli_fetch_assoc($resultaf)) {

                                    /* Exibição do TIPO 1 = Entrada e 2 = Saída */
                                    $mostratipo = $user_data['tipo'];
                                    if ($mostratipo == 2) {
                                        $mostratipo_output = "Saída";
                                        $background_color = "red";
                                    } else {
                                        $mostratipo_output = "Entrada";
                                        $background_color = "green";
                                    }

                                    echo "<tr>";
                                    echo "<td>".$user_data['nome']."</td>";
                                    echo "<td>".$user_data['descricao']."</td>";
                                    echo "<td>".$user_data['valor']."</td>";
                                    echo "<td style='background-color: $background_color;'>".$mostratipo_output."</td>";
                                    echo "<td>".$user_data['diadata']."</td>";
                                    echo "<td>".$user_data['meses']."</td>";
                                    echo "<td>".$user_data['anos']."</td>";
                                    echo "<td id='btn-dash'>
                                    <a class='btn-pencil' href='./atualizar.php?id=$user_data[id]' title='Atualizar'><img src='../img/pencil.png'></a>
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
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>

            
        </section>
        <?php 
            $footer_class='footer';
            include_once('../views/footer.php');
        ?>

    <script>
        function confirmaLock() {
            return confirm("Deseja bloquear ou desbloquear o usuário?");
        }
        function confirmaDelete() {
            return confirm("Deseja excluir o usuário?");
        }
    </script>
    <script src="../js/menubar.js"></script>
    <script src="../js/financeiro.js"></script>
    <script src="../js/sidebar.js"></script>
    <script>
        document.getElementById('alunos_id').addEventListener('change', function() {
            var alunoSelecionado = this.options[this.selectedIndex];
            var nomeAluno = alunoSelecionado.textContent;
            var idAluno = alunoSelecionado.value;
            document.getElementById('nome').value = nomeAluno;
        });
    </script>

    </body>
</html>