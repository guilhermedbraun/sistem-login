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
            $sqli = "SELECT * FROM disciplina ORDER BY id DESC"; // alterar para a nova cópia
        }
        $resulta = $conexao2->query($sqli); // alterar para a nova cópia
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

    <article class="artigo">
    <div class="contem">
        <div class="accordion_item">
            <div class="accordion_header">
                <span>Alerta de Expulsão</span>
                <div class="icon">
                    +
                </div>
            </div>
            <div class="accordion_content">
                <div class="apostila">
                    <h3>Arte Marcial não é brincadeira!</h3>
                    <p>Todo aluno de artes marciais ou artes esportivas, independente da graduação ou estilo de luta, deve usar o aprendizado marcial para defender não só a sí próprio, mas ao familiares, amigos e principalmente os mais fracos. Não admite corvadia contra uma pessoa indefesa.</p>
                    <p>Nunca levante as mãos para uma pessoa que não te ofereça risco de vida e em caso de tentativa de agressão a sua integridade física, defenda-se impedindo os golpes e afaste ou imobilize a pessoa para que ela entenda que com você ela não consiguirá nada.</p>

                    <h3>Motivos para ser Expulso:</h3>

                    <li>Agressão a um familiar (bateu nos pais, irmãos, avós, etc);</li>
                    <li>Agressão e desrespeito a professores;</li>
                    <li>Brigou na escola/curso/faculdade com outro aluno. Deverá comunicar ao Sensei ou Senpai para avaliação da situação;</li>
                    <li>Pratica para sair arrumando confusão na rua ou em festas;</li>
                    <li>Desentendimento com agressões a outros alunos da escola;</li>
                    <li>Arrumar confusão com membros de outro estilo de luta;</li>
                    <li>Participação de crimes;</li>

                </div>
            </div>
        </div>
        <div class="accordion_item">
            <div class="accordion_header">
                <span>Artigo 129 - Lesão Corporal</span>
                <div class="icon">
                    +
                </div>
            </div>
            <div class="accordion_content">
                <div class="apostila">
                    <h3>Segue a tabela penal</h3>
                    <div class="tabelartigo">
                        <div class="lesao">
                            <span>Lesão leve</span>
                            <p>Agressão sem grandes consequências.</p>
                            <p>Pena leve – de 3 meses a 1 ano de detenção.</p>
                            <p>Artigo 129, caput do Código Penal.</p>
                        </div>
                        <div class="lesao">
                            <span>Lesão Grave</span>
                                <p>Quando resulta em:</p>
                                <p>-sequelas temporária por mais de 30 dias</p>
                                <p>-perigo de vida</p>
                                <p>- fragilidade de membro, sentido ou função</p>
                                <p>-aceleração do parto</p>
                                <p>Pena – de 1 a 5 anos de reclusão</p>
                                <p>Artigo 129, § 1º</p>
                        </div>
                        <div class="lesao">
                            <span>Lesão gravíssima</span>
                                <p>Quando resulta em:</p>
                                <p>-Incapacidade permanente para o trabalho;</p>
                                <p>-enfermidade incurável;</p>
                                <p>-perda ou inutilização do membro, sentido ou função;</p>
                                <p>- deformidade permanente;</p>
                                <p>- aborto</p>
                                <p>Pena – 2 a 8 anos de reclusão</p>
                                <p>Artigo 129, § 2º</p>
                        </div>
                        <div class="lesao">
                            <span>Lesão com resultado de morte</span>
                                <p>Para configurar o crime, deve ficar claro que o autor não queria a morte, nem assumiu o risco de causá-la.</p>
                                <p>Pena – 4 a 12 anos de reclusão</p>
                                <p>Artigo 129, § 3o</p>
                        </div>
                    </div>

                    <p>O crime de lesão corporal está inserido no capitulo dos crimes contra a vida, no artigo 129 do Código Penal, que pune a conduta de alguém ofender a integridade física ou a saúde de outra pessoa. O mencionado artigo prevê 4 formas de lesão corporal: lesão leve, grave, gravíssima e seguida de morte, conforme detalhado no carrossel.</p>
                    <p>Importa ressaltar que, para os crimes cometidos em contexto de violência doméstica, conforme §9 e §10 da mencionada norma, a pena para a lesão  leve passa para 3 meses a 3 anos de reclusão, sendo que para as demais formas são aumentadas em 1/3. Para o caso de delito em ambiente doméstico, contra pessoa portadora de deficiência, a pena também é aumentada em 1/3.</p>
                    <p>Veja o que diz a lei:</p>
                    <p>Código Penal - Decreto-Lei no 2.848, de 7 de dezembro de 1940.</p>
                    <p>Lesão corporal</p>
                    <p>Art. 129. Ofender a integridade corporal ou a saúde de outrem:</p>
                    <p>Pena - detenção, de três meses a um ano.</p>
                    <p>Lesão corporal de natureza grave</p>
                    <p>§ 1º Se resulta:</p>
                    <p>I - Incapacidade para as ocupações habituais, por mais de trinta dias;</p>
                    <p>II - perigo de vida;</p>
                    <p>III - debilidade permanente de membro, sentido ou função;</p>
                    <p>IV - aceleração de parto:</p>
                    <p>Pena - reclusão, de um a cinco anos.</p>
                    <p>§ 2° Se resulta:</p>
                    <p>I - Incapacidade permanente para o trabalho;</p>
                    <p>II - enfermidade incurável;</p>
                    <p>III perda ou inutilização do membro, sentido ou função;</p>
                    <p>IV - deformidade permanente;</p>
                    <p>V - aborto:</p>
                    <p>Pena - reclusão, de dois a oito anos.</p>
                    <p>Lesão corporal seguida de morte</p>
                    <p>§ 3° Se resulta morte e as circunstâncias evidenciam que o agente não quís o resultado, nem assumiu o risco de produzí-lo:</p>
                    <p>Pena - reclusão, de quatro a doze anos.</p>
                    <p>Diminuição de pena</p>
                    <p>§ 4° Se o agente comete o crime impelido por motivo de relevante valor social ou moral ou sob o domínio de violenta emoção, logo em seguida a injusta provocação da vítima, o juiz pode reduzir a pena de um sexto a um terço.</p>
                    <p>Substituição da pena</p>
                    <p>§ 5° O juiz, não sendo graves as lesões, pode ainda substituir a pena de detenção pela de multa, de duzentos mil réis a dois contos de réis:</p>
                    <p>I - se ocorre qualquer das hipóteses do parágrafo anterior;</p>
                    <p>II - se as lesões são recíprocas.</p>
                    <p>Lesão corporal culposa</p>
                    <p>§ 6° Se a lesão é culposa: (Vide Lei nº 4.611, de 1965)</p>
                    <p>Pena - detenção, de dois meses a um ano.</p>
                    <p>Aumento de pena</p>
                    <p>§ 7º  Aumenta-se a pena de 1/3 (um terço) se ocorrer qualquer das hipóteses dos §§ 4º e 6º do art. 121 deste Código.(Redação dada pela Lei nº 12.720, de 2012)</p>
                    <p>§ 8º - Aplica-se à lesão culposa o disposto no § 5º do art. 121.(Redação dada pela Lei nº 8.069, de 1990)</p>
                    <p>Violência Doméstica    (Incluído pela Lei nº 10.886, de 2004)</p>
                    <p>§ 9º  Se a lesão for praticada contra ascendente, descendente, irmão, cônjuge ou companheiro, ou com quem conviva ou tenha convivido, ou, ainda, prevalecendo-se o agente das relações domésticas, de coabitação ou de hospitalidade: (Redação dada pela Lei nº 11.340, de 2006)</p>
                    <p>Pena - detenção, de 3 (três) meses a 3 (três) anos. (Redação dada pela Lei nº 11.340, de 2006)</p>
                    <p>§ 10. Nos casos previstos nos §§ 1º a 3º deste artigo, se as circunstâncias são as indicadas no § 9o deste artigo, aumenta-se a pena em 1/3 (um terço). (Incluído pela Lei nº 10.886, de 2004)</p>
                    <p>§ 11.  Na hipótese do § 9º deste artigo, a pena será aumentada de um terço se o crime for cometido contra pessoa portadora de deficiência. (Incluído pela Lei nº 11.340, de 2006)</p>
                    <p>§ 12. Se a lesão for praticada contra autoridade ou agente descrito nos arts. 142 e 144 da Constituição Federal, integrantes do sistema prisional e da Força Nacional de Segurança Pública, no exercício da função ou em decorrência dela, ou contra seu cônjuge, companheiro ou parente consanguíneo até terceiro grau, em razão dessa condição, a pena é aumentada de um a dois terços.  (Incluído pela Lei nº 13.142, de 2015)</p>
                </div>
            </div>
        </div>
    </div>
</article>

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
        <script src="../js/accordion.js"></script>
  </body>
</html>