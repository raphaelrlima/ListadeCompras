<?php
/**
 * Created by PhpStorm.
 * User: rapha
 * Date: 17/05/2017
 * Time: 05:01
 * <a href="addForm.php">Adicionar Novo Produto</a>
 */
require_once ('config.php');
include('login.php');
#include("config.php");
$dbh= new mysqli(server, user, pass, database);
if ($dbh->connect_errno) {
    echo "<p>MySQL error no {$dbh->connect_errno} : {$dbh->connect_error}</p>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="CSS/pagInicial/navbar.css">
<link rel="stylesheet" href="CSS/pagInicial/table.css">
<link rel="stylesheet" href="CSS/pagInicial/pagInicial.css">
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
    <b id="welcome">Welcome : <i><?php echo $lgn_usuario; ?></i></b>
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

<section>
  <h3>Lista de Compras</h3>
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

        $sql = "SELECT * FROM `tb_produto` ORDER BY tpo_produto";


        $produtos = $dbh->query($sql);

        foreach ($produtos as $produto) {
            echo "<tr>".
                "<td>"."<input type='checkbox' name='check_list[]' value='". $produto['idt_produto']."'"."></td>".
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
  </div>
    <button id="btnForm">Adicionar novo Produto</button>
    <script>
        var btn = document.getElementById('btnForm');
        btn.addEventListener('click', function () {
            document.location.href = 'addForm.php';
        })
    </script>
<input type="submit" align="right" name="botao-ok" value="Salvar Alteracoes">
</section>



</body>
</html>


