<?php
/**
 * Created by PhpStorm.
 * User: rapha
 * Date: 17/05/2017
 * Time: 05:01
 *
 *
 * <button id="btnForm">Adicionar novo Produto</button>
<script>
var btn = document.getElementById('btnForm');
btn.addEventListener('click', function () {
document.location.href = 'addForm.php';
})
</script>
 */
require_once ('config.php');
if(!isset($_SESSION))
{
    session_start();
}
#include("config.php");
$dbh= new mysqli(server, user, pass, database);
if ($dbh->connect_errno) {
    echo "<p>MySQL error no {$dbh->connect_errno} : {$dbh->connect_error}</p>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head><title>Lista de Compras</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="CSS/pagInicial/navbar.css">
    <link rel="stylesheet" href="CSS/pagInicial/table.css">
    <link rel="stylesheet" href="CSS/pagInicial/pagInicial.css">
    <script src="js/jquery1.3.2/jquery.min.js"></script>
</head>
<body>
<div id="logo">
    Estoque de Casa<br/>
    Logo/Fonte Legal
</div>
<div id="navbar">

    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="#">Relatorios</a></li>
        <li><a href="login.php">LOGIN</a></li>
    </ul>
    <b id="bemvindo">Bem Vindo : <i><?php echo $_SESSION['nme_usuario']; ?></i></b>
    <b id="logout"><a href="logout.php">Log Out</a></b>
</div>
<section>
    <div class="img-info">
        <h1>Bem Vindo ao estoque de casa !</h1>
        <table>
            <tr>
                <td><img src="IMG/carrinho.jpg"></td>
                <td><h3>O novo sistema que ir� revolucionar a sua casa !!!!!! � isso mesmo que voce leu !! N�o precisa mais anotar nada em Papel, � isso mesmo que voce leu !!
                        Registre suas compras e gerencie os produtos de sua casa. � s� aqui na Lista de Compras !</h3></td>
            </tr>
        </table>
    </div>
</section>

<form action="" method="post" name="sel">
    <h3>Lista de Compras</h3>
    <input type="submit" align="right" name="sel" value="Salvar Alteracoes">
    <a href="addForm.php">Adicionar Novo Produto</a>
    <div class="tbl-header">

        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Selecione</th>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Tipo</th>
                <th>Medida</th>
                <th>Preco</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php
            $sql = "SELECT * FROM `tb_produto` ORDER BY tpo_produto, nme_produto ASC";
            $produtos = $dbh->query($sql);
            foreach ($produtos as $produto) {
                echo "<tr>".
                    "<td>"."<input type='checkbox' name='check_list[]' id='check_list' value='". $produto['idt_produto']."'"."></td>".
                    "<td>" . $produto['nme_produto']."</td>".
                    "<td>".$produto['qtd_produto']."</td>".
                    "<td>".$produto['tpo_produto']."</td>".
                    "<td>".$produto['med_produto']."</td>".
                    "<td>".$produto['prc_produto']."</td>".
                    "</tr>";
            }
            ?>
            </tbody>
        </table>

        <?php
        if (isset($_POST['sel'])){
                if (empty($_POST['check_list'])){
                    $message = "Selecione um ou mais produtos";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }else {

                    if ($_SESSION['loggedin'] == true) {

                        $idtsel = $_POST['check_list'];
                        $data = date('Y-m-d');
                        $idtusuario = $_SESSION['idt_usuario'];

                        foreach ($idtsel as $produtoidt) {
                            $sqlsel = "INSERT INTO ta_relatorio(dta_relatorio, cod_usuario, cod_produto) VALUES ('$data','$idtusuario','$produtoidt')";
                            $dbh->query($sqlsel);
                        }
                        $mensagem = "Lista de compras criada com sucesso!";
                        echo "<script type='text/javascript'>alert('$mensagem');</script>";


                    } else {
                        header("location: login.php");  //Redirecting To Other Page
                    }
                }
        }
        ?>
    </div>
</form>
</section>
</body>
</html>


