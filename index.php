<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Byakko Ryu Dojo - Ninpo Taijutsu</title>
</head>
<body>
    <div class="box">
        <div class="container">

            <div class="top">
                <header>Bem Vindo</header>
            </div>

            <form method="POST">
<?php
    include_once('./system/config.php');
    include_once('./system/timeout.php');
    if(isset($_POST['submit']))
    {
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        $sql = "SELECT id FROM alunos WHERE email='$email'";
        $result1 = $conexao->query($sql);
        $sqli = "SELECT id FROM alunos WHERE email='$email' and senha='$senha'";
        $result2 = $conexao->query($sqli);

        if($result1->num_rows < 1)
        {
            echo "<style>.input-field { display: none; }</style>";
            echo "<div class='msg_erro'>";
            echo "Email não cadastrado!";
            echo "</div>";
            echo "<div id='loading'>";
            echo "<div class='blobs'>";
            echo "<div class='blob-center'></div>";
            echo "<div class='blob'></div>";
            echo "<div class='blob'></div>";
            echo "<div class='blob'></div>";
            echo "<div class='blob'></div>";
            echo "<div class='blob'></div>";
            echo "<div class='blob'></div>";
            echo "</div>";
            echo "</div>";
            session_start();
            header("Refresh: 5;");
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
        }
        elseif($result2->num_rows < 1)
        {
            echo "<style>.input-field { display: none; }</style>";
            echo "<div class='msg_erro'>";
            echo "Senha incorreta!";
            echo "</div>";
            echo "<div id='loading'>";
            echo "<div class='blobs'>";
            echo "<div class='blob-center'></div>";
            echo "<div class='blob'></div>";
            echo "<div class='blob'></div>";
            echo "<div class='blob'></div>";
            echo "<div class='blob'></div>";
            echo "<div class='blob'></div>";
            echo "<div class='blob'></div>";
            echo "</div>";
            echo "</div>";
            session_start();
            header("Refresh: 32;");
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
        }
        else
        {
            session_start();

            if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
            {
                $email = $_POST['email'];
                $senha = $_POST['senha'];
        
                $sql = "SELECT * FROM alunos WHERE email = '$email' and senha = '$senha'";
                $result = $conexao->query($sql);
        
                if(mysqli_num_rows($result) > 0)
                {
                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $email = $row['email'];
                    $senha = $row['senha'];
                    $adm = $row['adm'];
                    $kyu = $row['kyu'];
                    $ativo = $row['ativo'];
                    $locked = $row['locked'];
        
                    $_SESSION['id'] = $id;
                    $_SESSION['email'] = $email;
                    $_SESSION['senha'] = $senha;
                    $_SESSION['adm'] = $adm;
                    $_SESSION['kyu'] = $kyu;
                    $_SESSION['ativo'] = $ativo;

                    if($locked == 1)
                    {
                        if($_SESSION['ativo'] > 0)
                        {
                            if ($adm > 1)
                            {
                                header('Location: ./aulas/index.php');
                            }
                            else
                            {
                                header('Location: ./adm/index.php');
                            }
                        }
                        else
                        {
                            echo "<style>.input-field { display: none; }</style>";
                            echo "<div class='msg_erro'>";
                            echo "Entre em contato com o Administrador!";
                            echo "</div>";
                            echo "<div id='loading'>";
                            echo "<div class='blobs'>";
                            echo "<div class='blob-center'></div>";
                            echo "<div class='blob'></div>";
                            echo "<div class='blob'></div>";
                            echo "<div class='blob'></div>";
                            echo "<div class='blob'></div>";
                            echo "<div class='blob'></div>";
                            echo "<div class='blob'></div>";
                            echo "</div>";
                            echo "</div>";
                            header("Refresh: 12;");
                            unset($_SESSION['email']);
                            unset($_SESSION['senha']);
                            unset($_SESSION['adm']);
                            unset($_SESSION['kyu']);
                            unset($_SESSION['ativo']);
                        }

                    }
                    else
                    {
                        echo "<style>.input-field { display: none; }</style>";
                        echo "<div class='msg_erro'>";
                        echo "Entre em contato com o Administrador!";
                        echo "</div>";
                        echo "<div id='loading'>";
                        echo "<div class='blobs'>";
                        echo "<div class='blob-center'></div>";
                        echo "<div class='blob'></div>";
                        echo "<div class='blob'></div>";
                        echo "<div class='blob'></div>";
                        echo "<div class='blob'></div>";
                        echo "<div class='blob'></div>";
                        echo "<div class='blob'></div>";
                        echo "</div>";
                        echo "</div>";
                        header("Refresh: 12;");
                        unset($_SESSION['email']);
                        unset($_SESSION['senha']);
                        unset($_SESSION['adm']);
                        unset($_SESSION['kyu']);
                        unset($_SESSION['ativo']);
                    }
                }
                else
                {
                    header('Location: ./index.php');
                }
            }
        }
    }
?>
                <div class="input-field">
                    <input type="text" class="input" placeholder="Email" name="email" id="email" maxlength="50" required>
                    <i class='bx bx-user'></i>
                </div>

                <div class="input-field">
                    <input type="password" class="input" placeholder="Password" name="senha" id="senha" minlength="4" maxlength="15" required>
                    <i class='bx bx-lock-alt'></i>
                </div>

                <div class="input-field">
                    <input type="submit" name="submit" class="submit" value="Login">
                </div>

            </form>

        </div>
    </div>
</body>
</html>