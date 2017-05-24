<?php
/**
 * Created by PhpStorm.
 * User: uniceub
 * Date: 23/05/17
 * Time: 18:15
 */
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Adicionar Produtos</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<link rel="stylesheet" href="navbar.css">
<link rel="stylesheet" href="table.css">
<link rel="stylesheet" href="pagInicial.css">
<script type="text/javascript" src="view.js"></script>
</head>
<body id="main_body" >

<div id="logo">
    Lista de Compras<br/>
Logo/Fonte Legal
</div>
<div id="navbar">
<ul>
<li><a href="idex.html">Inicio</a></li>
<li><a href="#">Relatorios</a></li>
<li><a href="Login\pagLogin.html">LOGIN</a></li>
</ul>
</div>

	<img id="top" src="top.png" alt="">
	<div id="form_container">

		<h1><a>Adicionar Produtos</a></h1>
		<form id="form_31520" class="appnitro"  method="post" action="">
					<div class="form_description">
			<h2>Adicionar Produtos</h2>
			<p>Insira aqui as informacoes do novo produto
</p>
		</div>
			<ul >

					<li id="li_1" >
		<label class="description" for="element_1">Nome </label>
		<div>
			<input id="element_1" name="element_1" class="element text medium" type="text" maxlength="255" value=""/>
		</div>
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Quantidade
 </label>
		<div>
			<input id="element_3" name="element_3" class="element text medium" type="text" maxlength="255" value=""/>
		</div>
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Tipo </label>
		<div>
		<select class="element select medium" id="element_5" name="element_5">
<option value="" selected="selected"></option>
<option value="1" >Comida</option>
<option value="2" >Limpeza</option>
<option value="3" >Eletronico</option>
<option value="4" >Acessorios</option>
		</select>
		</div>
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Medida </label>
		<span>
			<input id="element_4_1" name="element_4" class="element radio" type="radio" value="1" />
<label class="choice" for="element_4_1">Quilo</label>
<input id="element_4_2" name="element_4" class="element radio" type="radio" value="2" />
<label class="choice" for="element_4_2">Litro</label>
<input id="element_4_3" name="element_4" class="element radio" type="radio" value="3" />
<label class="choice" for="element_4_3">Pacote</label>

		</span>
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Price </label>
		<span class="symbol">$</span>
		<span>
			<input id="element_2_1" name="element_2_1" class="element text currency" size="10" value="" type="text" /> .
			<label for="element_2_1">Dollars</label>
		</span>
	<span>
	<input id="element_2_2" name="element_2_2" class="element text" size="2" maxlength="2" value="" type="text" />
	<label for="element_2_2">Cents</label></span></li>
<li class="buttons">
<input type="hidden" name="form_id" value="31520" />
<input id="saveForm" class="button_text" type="submit" name="adicionar" value="Adicionar" />
</li></ul>
	</form>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>