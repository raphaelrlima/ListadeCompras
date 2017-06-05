<?php
/**
 * Created by PhpStorm.
 * User: rapha
 * Date: 17/05/2017
 * Time: 05:01
 */
require_once ('DBConfig.php');
$db = new DBConfig();
#include("config.php");
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
        $db->selectProd();
        ?>
      </tbody>
    </table>
  </div>
<a href="addForm.php">Adicionar Novo Produto</a>
<input type="button" align="right" name="botao-ok" value="Salvar Alteracoes">
</section>



</body>
</html>


