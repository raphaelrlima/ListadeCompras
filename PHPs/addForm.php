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
<link rel="stylesheet" type="text/css" href="CSS/addForm/view.css" media="all">
    <link rel="stylesheet" href="CSS/pagInicial/navbar.css">
<script type="text/javascript" src="JS/view.js"></script>
</head>
<body>

<div id="logo">
    Lista de Compras
</div>
<div id="navbar">
<ul>
<li><a href="index.php">Inicio</a></li>
<li><a href="report.php">Relatorios</a></li>
<li><a href="login.php">LOGIN</a></li>
</ul>
</div>

	<img id="top" src="IMG/top.png" alt="">
	<div id="form_container">
        <?php

        require_once ('config.php');
        if(!isset($_POST['submit'])){
        ?>
        <h1><a>Adicionar Produtos</a></h1>
        <form id="form_31520" class="appnitro" method="post" action="<?=$_SERVER['PHP_SELF']?>">
            <div class="form_description">
                <h2>Adicionar Produtos</h2>
                <p>Insira aqui as informacoes do novo produto
                </p>
            </div>
            <ul>

                <li id="li_1">
                    <label class="description" for="nmeProduto">Nome </label>
                    <div>
                        <input id="nme_produto" name="nmeProduto" class="element text medium" type="text" maxlength="255"
                               value=""/>
                    </div>
                </li>
                <li id="li_3">
                    <label class="description" for="qtdProduto">Quantidade
                    </label>
                    <div>
                        <input id="qtdProduto" name="qtdProduto" class="element text medium" type="text" maxlength="255"
                               value=""/>
                    </div>
                </li>
                <li id="li_5">
                    <label class="description" for="tpoProduto">Tipo </label>
                    <div>
                        <select class="element select medium" id="tpoProduto" name="tpoProduto">
                            <option value="" selected="selected">Selecione</option>
                            <option value="Comida">Comida</option>
                            <option value="Bebida">Bebida</option>
                            <option value="Limpeza">Limpeza</option>
                            <option value="Eletronico">Eletronico</option>
                            <option value="Acessorios">Acessorios</option>
                        </select>
                    </div>
                </li>
                <li id="li_4">
                    <label class="description" for="element_4">Medida </label>
                    <div>
                        <select class="element select medium" id="medProduto" name="medProduto">
                            <option value="" selected="selected">Selecione</option>
                            <option value="Quilo">Quilo</option>
                            <option value="Litro">Litro</option>
                            <option value="Pacote">Pacote</option>
                            <option value="Unidade">Unidade</option>
                        </select>
                    </div>
                </li>
                <li id="li_2">
                    <label class="description" for="element_2">Preco </label>
                    <span class="symbol">$</span>
                    <span>
			<input id="element_2_1" name="prcProduto1" class="element text currency" size="10" value="" type="text"/> .
			<label for="element_2_1">Reais</label>
		</span>
                    <span>
	<input id="element_2_2" name="prcProduto2" class="element text" size="2" maxlength="2" value="" type="text"/>
	<label for="element_2_2">Centavos</label></span></li>
                <li class="buttons">
                    <input id="saveForm" class="button_text" type="submit" name="submit" value="Adicionar"/>
                </li>
            </ul>
            <?php
            }else{
                $dbh = new mysqli(server, user, pass, database);
                # check connection
                if ($dbh->connect_errno) {
                    echo "<p>MySQL error no {$dbh->connect_errno} : {$dbh->connect_error}</p>";
                    exit();
                }

                $nmeProduto=$_POST['nmeProduto'];
                $qtdProduto=$_POST['qtdProduto'];
                $tpoProduto=$_POST['tpoProduto'];
                $medProduto=$_POST['medProduto'];
                $prcProduto=$_POST['prcProduto1'];
                $prcProduto2=$_POST['prcProduto2'];
                $centavos= $prcProduto2/100;
                $prcProduto3= $prcProduto + $centavos;


                $exists=0;
                $result= $dbh->query("SELECT nme_produto FROM tb_produto WHERE nme_produto = '$nmeProduto' LIMIT 1");
                if ($result->num_rows == 1) {
                    $exists =$exists +1;
                    $result = $dbh->query("SELECT qtd_produto from tb_produto WHERE qtd_produto = '$qtdProduto' LIMIT 1");
                    if ($result->num_rows == 1)
                        $exists = $exists +1;
                    $result = $dbh->query("SELECT tpo_produto from tb_produto WHERE tpo_produto = '$tpoProduto' LIMIT 1");
                    if ($result->num_rows == 1)
                        $exists = $exists +1;
                    $result = $dbh->query("SELECT med_produto from tb_produto WHERE med_produto = '$medProduto' LIMIT 1");
                    if ($result->num_rows == 1)
                        $exists = $exists+1;
                    $result = $dbh->query("SELECT prc_produto from tb_produto WHERE prc_produto = '$prcProduto' LIMIT 1");
                    if ($result->num_rows == 1)
                        $exists = $exists+1;
                    if($exists== 5){
                        echo "<p>O produto que deseja inserir já existe!</p><a href='addForm.php'>Retornar para criacao</a>";
                    }


                }else {

                    if ($nmeProduto == "" || $qtdProduto == "" || $tpoProduto == "" || $tpoProduto == "Selecione" || $medProduto == "" || $medProduto == "Selecione" || $prcProduto == "" || $prcProduto2 == "") {
                        echo "<p>Campos em Branco, favor inserir!</p><a href='addForm.php'>Retornar para criacao</a>";
                    } else {


                        $sql = "INSERT INTO tb_produto (nme_produto, qtd_produto, tpo_produto, med_produto, prc_produto) VALUES ('$nmeProduto','$qtdProduto','$tpoProduto','$medProduto','$prcProduto3')";

                        if ($dbh->query($sql)) {
                            echo "<p>Produto Inserido com Sucesso</p>
                                   <a href='addForm.php'>Adicionar novo produto</a></br>
                                   <a href='index.php'>Retornar ao menu</a>";
                        } else {
                            echo "<p>MySQL ERRO no {$dbh->errno} : {$dbh->error}</p>";
                            exit();
                        }
                    }
                }
            }
            ?>

	</form>
	</div>
	<img id="bottom" src="IMG/bottom.png" alt="">
	</body>
</html>