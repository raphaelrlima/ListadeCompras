<?php
/**
 * Created by PhpStorm.
 * User: rapha
 * Date: 17/05/2017
 * Time: 05:01
 */
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href=>
<link rel="stylesheet" href="table.css">
<link rel="stylesheet" href="CSS.css">
</head>
<body>
<div id="logo">
    Estoque de Casa<br/>
Logo/Fonte Legal
</div>
<div id="navbar">

<ul>
<li><a href="#">In�cio</a></li>
<li><a href="#">Relat�rios</a></li>
<li><a href="pagLogin.html">LOGIN</a></li>

</ul>
</div>
<section>
<div class="img-info">
<h1>Bem Vindo ao estoque de casa !</h1>
<table>
<tr>
<td><img src="carrinho.jpg"></td>
<td><h3>O novo sistema que ir� revolucionar a sua casa !!!!!! � isso mesmo que voce ouviu !! N�o precisa mais anotar nada em Papel, � isso mesmo que voce ouviu !!
Registre suas compras e gerencie os produtos de sua casa. � s� aqui na Estoque de Casa !</h3></td>
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
        <tr>
          <td>Arroz</td>
          <td>5</td>
          <td>Comida</td>
          <td>KG</td>
	  <td>$11.00</td>
        </tr>
      </tbody>
    </table>
  </div>
<button onclick="window.location.href='form.html'">Adicionar Novo Produto</button>
<input type="button" align="right" name="botao-ok" value="Salvar Altera��es">
</section>



</body>
</html>

