<?php
/**
 * Created by PhpStorm.
 * User: uniceub
 * Date: 23/05/17
 * Time: 18:11
 */
require('config.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Página de Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="CSS/login/login.css" rel="stylesheet"/>
    <link rel="stylesheet" href="CSS/pagInicial/navbar.css">

</head>
<body>
<div id="logo">
    Lista de Compras<br/>
    Logo/Fonte Legal
</div>
<div id="navbar">
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="#">Relatorios</a></li>
        <li><a href="login.php">LOGIN</a></li>
    </ul>
</div>

<div class="login-page">
    <div class="form">
        <?php
        if (!isset($_POST['criar'])) {
        ?>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="register-form">
            <input type="text" name="nmeUsuario" placeholder="Nome"/>
            <input type="text" name="lgnUsuario" placeholder="Login"/>
            <input type="password" name="pwdUsuario" placeholder="Senha"/>
            <input type="text" name="emlUsuario" placeholder="Email"/>
            <input type="submit" name="criar" value="Criar"/>
            <p class="message">Ja registrado? <a href="#">Log In</a></p>
            <?php
            }else{

                $dbh = new mysqli(server, user, pass, database);
                # check connection
                if ($dbh->connect_errno) {
                    echo "<p>MySQL error no {$dbh->connect_errno} : {$dbh->connect_error}</p>";
                    exit();
                }

                $nmeUsuario= $_POST['nmeUsuario'];
                $lgnUsuario= $_POST['lgnUsuario'];
                $pwdUsuario= $_POST['pwdUsuario'];
                $emlUsuario= $_POST['emlUsuario'];

                $exists=0;
                $result= $dbh->query("SELECT lgn_usuario FROM tb_usuario WHERE lgn_usuario = '$lgnUsuario' LIMIT 1");
                if ($result->num_rows == 1) {
                    $exists = 1;
                    $result = $dbh->query("SELECT eml_usuario from tb_usuario WHERE eml_usuario = '$emlUsuario' LIMIT 1");
                    if ($result->num_rows == 1) $exists = 2;
                } else {
                    $result = $dbh->query("SELECT eml_usuario from tb_usuario WHERE eml_usuario = '$emlUsuario' LIMIT 1");
                    if ($result->num_rows == 1) $exists = 3;
                }

                if ($exists == 1) echo "<p>Nome de Usuario já existe!</p><a href='login.php'>Retornar para criacao</a>";
                else if ($exists == 2) echo "<p>Nome de Usuario e Email ja existem!</p><a href='login.php'>Retornar para criacao</a>";
                else if ($exists == 3) echo "<p>Email ja existe!</p></br><a href='login.php'>Retornar para criacao</a>";
                else if($nmeUsuario == "" || $lgnUsuario == "" || $pwdUsuario == "" || $emlUsuario == "") echo "<p>Campos em branco favor inserir informacao</p><a href='login.php'>Retornar para criacao</a>";
                else {
                    $sql = "INSERT INTO tb_usuario (nme_usuario, lgn_usuario, pwd_usuario, eml_usuario) VALUES ('$nmeUsuario','$lgnUsuario','$pwdUsuario','$emlUsuario')";

                    if($dbh->query($sql)){
                        echo "<p>Usuário Inserido com Sucesso</p><a href='index.php'>Retornar para o inicio</a>";
                    }else{
                        echo "<p>MySQL ERRO no {$dbh->errno} : {$dbh->error}</p>";
                        exit();
                    }
                }
            }
            ?>
        </form>

            <?php
            session_start();
            if (!isset($_POST['logar'])) {
            ?>
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post" class="login-form">
                <input type="text" name="lgn_usuario" placeholder="Login"/>
                <input type="password" name="pwd_usuario" placeholder="Senha"/>
                <input type="submit" name="logar" value="Logar"/>
                <p class="message">Nao registrado? <a href="#">Crie uma conta</a></p>
                <span><?php echo $error; ?></span>

                <?php
                } else {
                    $bd = new mysqli(server, user, pass, database);
                    if ($bd->connect_errno) {
                        echo "<p>MySQL error no {$bd->connect_errno} : {$bd->connect_error}</p>";
                        exit();
                    }

                    // Define $username and $password
                    $username = $_POST['lgn_usuario'];
                    $password = $_POST['pwd_usuario'];


                    // Verify blank spaces
                        if ($username == "" || $password == "") {
                            echo "<p>Campo em branco favor inserir informacao</p><a href='login.php'>Retornar para o login</a>";
                        } else {
                            // SQL query to fetch information of registerd users and finds user match.
                            $query = "SELECT * FROM tb_usuario WHERE lgn_usuario = '$username' AND pwd_usuario = '$password' LIMIT 1";
                            $resultado= $bd->query($query);

                            if ($resultado->num_rows == 1){
                              foreach ($resultado as $usuario){
                                  $_SESSION['idt_usuario'] = $usuario['idt_usuario'];
                                   $_SESSION['lgn_usuario'] = $usuario['lgn_usuario'];
                                   $_SESSION['nme_usuario'] = $usuario['nme_usuario'];
                                   $_SESSION['loggedin'] = true;
                               }
                               header("location: index.php");  //Redirecting To Other Page
                            } else {
                                echo "Nome de usuário ou senha invalido";

                            }
                        }
                }
                ?>
            </form>
    </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="JS/login.js"></script>
</body>
</html>