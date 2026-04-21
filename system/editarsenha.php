<?php
session_start();
include_once('config.php');

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
   // print_r($_SESSION);// retirar
    $logado = $_SESSION['id'];
    if (!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM alunos WHERE id=$id";
        $result = $conexao->query($sqlSelect);
        if ($result->num_rows > 0)
        {
            while ($user_data = mysqli_fetch_assoc($result))
            {
                $email = $user_data['email'];
                $senha = $user_data['senha'];
            }
        }
        else
        {
            header('Location: ../index.php');
        }
    }
    else
    {
        header('Location: ../index.php');
    }
}
else
{
    header('Location: ../index.php'); // header('Location: ../checkout/index.php');
}
require_once('../views/header.php');
require_once('../views/nav.php');
?>
    <section class="sections">

            <div class="boxs">
                <form method="POST">
                        <legend>Editar</legend>
<?php

if(isset($_POST['supdate']))
{
    
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
	$confirmarSenha = addslashes( $_POST['confSenha']);

    if ($senha == $confirmarSenha)
    {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $sqlInsert = "UPDATE alunos 
    SET email='$email',senha='$senha' WHERE id=$id";
    $result = $conexao->query($sqlInsert);
?>
    <div class='msg_sucesso'>
        Senha alterada com sucesso! <?php header("Refresh: 3; URL=./perfil.php"); ?>
    </div>
<?php
    }
    else
    {
?>
    <div class="msg_erro">
        Senhas não conferem!<?php header("Refresh: 3;"); ?>
    </div>
<?php
    }
}

?>
                    <div class="input-fielc">
                        <input type="hidden" class="input" placeholder="Email" name="email" id="email" value="<?php echo $email; ?>" maxlength="50" required>
                    </div>
                <br>

                    <div class="input-fielc">
                        <i class='bx bx-lock-alt'></i>
                        <input type="text" class="input" placeholder="Nova Senha 4 a 15 dígitos." name="senha" id="senha" minlength="4" maxlength="15" required>
                    </div>
                <br>

                    <div class="input-fielc">
                        <i class='bx bx-lock-alt'></i>
                        <input type="text" class="input" placeholder="Confirme a Senha." name="confSenha" id="senha" minlength="4" maxlength="15" required>
                    </div>
                <br>
 
                    <div class="input-field">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="supdate" class="submit" value="Salvar">
                    </div>
                    
                    <?php 
                        $footer_class='copyright';
                        include_once('../views/footer.php');
                    ?>
            </form>
        </div>
    </section>
        <script src="../js/menubar.js"></script>
    </body>
</html>
