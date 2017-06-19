<?php
/**
 * Created by PhpStorm.
 * User: rapha
 * Date: 19/06/2017
 * Time: 10:45
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

if ($_SESSION['loggedin'] == false) {
    header("location: login.php");  //Redirecting To Other Page
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
    Lista de Compras
</div>
<div id="navbar">

    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="report.php">Relatorios</a></li>
        <li><a href="login.php">LOGIN</a></li>
    </ul>
    <b id="bemvindo">Bem Vindo : <i><?php echo $_SESSION['nme_usuario']; ?></i></b>
    <b id="logout"><a href="logout.php">Log Out</a></b>
</div>
<section>
    <h3>Compras de Janeiro</h3>
    <div class="tbl-header">

        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Tipo</th>
                <th>Medida</th>
                <th>Preco</th>
                <th>Data</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php
            $idtusuario = $_SESSION['idt_usuario'];

            $sql1 = "SELECT nme_produto, qtd_produto, tpo_produto, med_produto, prc_produto, dta_relatorio 
                    FROM `tb_produto` 
                    JOIN ta_relatorio ON idt_produto = cod_produto
                    JOIN tb_usuario ON idt_usuario = cod_usuario 
                    WHERE idt_usuario = '$idtusuario' AND dta_relatorio BETWEEN '2017-01-01' AND '2017-01-31'
                    ORDER BY tpo_produto, nme_produto ASC";
            $produtos = $dbh->query($sql1);
            foreach ($produtos as $produto) {
                echo "<tr>" .
                    "<td>" . $produto['nme_produto'] . "</td>" .
                    "<td>" . $produto['qtd_produto'] . "</td>" .
                    "<td>" . $produto['tpo_produto'] . "</td>" .
                    "<td>" . $produto['med_produto'] . "</td>" .
                    "<td>" . $produto['prc_produto'] . "</td>" .
                    "<td>" . $produto['dta_relatorio'] . "</td>" .
                    "</tr>";
            }
            ?>
            </tbody>
        </table>


    </div>
</section>
<section>
    <h3>Compras de Fevereiro</h3>
    <div class="tbl-header">

        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Tipo</th>
                <th>Medida</th>
                <th>Preco</th>
                <th>Data</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php

            $idtusuario = $_SESSION['idt_usuario'];

            $sql2 = "SELECT nme_produto, qtd_produto, tpo_produto, med_produto, prc_produto, dta_relatorio 
                    FROM `tb_produto` 
                    JOIN ta_relatorio ON idt_produto = cod_produto
                    JOIN tb_usuario ON idt_usuario = cod_usuario 
                    WHERE idt_usuario = '$idtusuario' AND dta_relatorio BETWEEN '2017-02-01' AND '2017-02-28'
                    ORDER BY tpo_produto, nme_produto ASC";
            $produtos = $dbh->query($sql2);
            foreach ($produtos as $produto2) {
                echo "<tr>" .
                    "<td>" . $produto2['nme_produto'] . "</td>" .
                    "<td>" . $produto2['qtd_produto'] . "</td>" .
                    "<td>" . $produto2['tpo_produto'] . "</td>" .
                    "<td>" . $produto2['med_produto'] . "</td>" .
                    "<td>" . $produto2['prc_produto'] . "</td>" .
                    "<td>" . $produto2['dta_relatorio'] . "</td>" .
                    "</tr>";
            }
            ?>
            </tbody>
        </table>

    </div>
</section>
<section>
    <h3>Compras de Marco</h3>
    <div class="tbl-header">

        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Tipo</th>
                <th>Medida</th>
                <th>Preco</th>
                <th>Data</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php

            $idtusuario = $_SESSION['idt_usuario'];

            $sql3 = "SELECT nme_produto, qtd_produto, tpo_produto, med_produto, prc_produto, dta_relatorio 
                    FROM `tb_produto` 
                    JOIN ta_relatorio ON idt_produto = cod_produto
                    JOIN tb_usuario ON idt_usuario = cod_usuario 
                    WHERE idt_usuario = '$idtusuario' AND dta_relatorio BETWEEN '2017-03-01' AND '2017-03-31'
                    ORDER BY tpo_produto, nme_produto ASC";
            $produtos = $dbh->query($sql3);
            foreach ($produtos as $produto3) {
                echo "<tr>" .
                    "<td>" . $produto3['nme_produto'] . "</td>" .
                    "<td>" . $produto3['qtd_produto'] . "</td>" .
                    "<td>" . $produto3['tpo_produto'] . "</td>" .
                    "<td>" . $produto3['med_produto'] . "</td>" .
                    "<td>" . $produto3['prc_produto'] . "</td>" .
                    "<td>" . $produto3['dta_relatorio'] . "</td>" .
                    "</tr>";
            }
            ?>
            </tbody>
        </table>

    </div>
</section>
<section>
    <h3>Compras de Abril</h3>
    <div class="tbl-header">

        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Tipo</th>
                <th>Medida</th>
                <th>Preco</th>
                <th>Data</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php

            $idtusuario = $_SESSION['idt_usuario'];

            $sql4 = "SELECT nme_produto, qtd_produto, tpo_produto, med_produto, prc_produto, dta_relatorio 
                    FROM `tb_produto` 
                    JOIN ta_relatorio ON idt_produto = cod_produto
                    JOIN tb_usuario ON idt_usuario = cod_usuario 
                    WHERE idt_usuario = '$idtusuario' AND dta_relatorio BETWEEN '2017-04-01' AND '2017-04-30'
                    ORDER BY tpo_produto, nme_produto ASC";
            $produtos = $dbh->query($sql4);
            foreach ($produtos as $produto4) {
                echo "<tr>" .
                    "<td>" . $produto4['nme_produto'] . "</td>" .
                    "<td>" . $produto4['qtd_produto'] . "</td>" .
                    "<td>" . $produto4['tpo_produto'] . "</td>" .
                    "<td>" . $produto4['med_produto'] . "</td>" .
                    "<td>" . $produto4['prc_produto'] . "</td>" .
                    "<td>" . $produto4['dta_relatorio'] . "</td>" .
                    "</tr>";
            }
            ?>
            </tbody>
        </table>

    </div>
</section>
<section>
    <h3>Compras de Maio</h3>
    <div class="tbl-header">

        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Tipo</th>
                <th>Medida</th>
                <th>Preco</th>
                <th>Data</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php

            $idtusuario = $_SESSION['idt_usuario'];

            $sql5 = "SELECT nme_produto, qtd_produto, tpo_produto, med_produto, prc_produto, dta_relatorio 
                    FROM `tb_produto` 
                    JOIN ta_relatorio ON idt_produto = cod_produto
                    JOIN tb_usuario ON idt_usuario = cod_usuario 
                    WHERE idt_usuario = '$idtusuario' AND dta_relatorio BETWEEN '2017-05-01' AND '2017-05-31'
                    ORDER BY tpo_produto, nme_produto ASC";
            $produtos = $dbh->query($sql5);
            foreach ($produtos as $produto5) {
                echo "<tr>" .
                    "<td>" . $produto5['nme_produto'] . "</td>" .
                    "<td>" . $produto5['qtd_produto'] . "</td>" .
                    "<td>" . $produto5['tpo_produto'] . "</td>" .
                    "<td>" . $produto5['med_produto'] . "</td>" .
                    "<td>" . $produto5['prc_produto'] . "</td>" .
                    "<td>" . $produto5['dta_relatorio'] . "</td>" .
                    "</tr>";
            }
            ?>
            </tbody>
        </table>

    </div>
</section>
<section>
    <h3>Compras de Junho</h3>
    <div class="tbl-header">

        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Tipo</th>
                <th>Medida</th>
                <th>Preco</th>
                <th>Data</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php

            $idtusuario = $_SESSION['idt_usuario'];

            $sql6 = "SELECT nme_produto, qtd_produto, tpo_produto, med_produto, prc_produto, dta_relatorio 
                    FROM `tb_produto` 
                    JOIN ta_relatorio ON idt_produto = cod_produto
                    JOIN tb_usuario ON idt_usuario = cod_usuario 
                    WHERE idt_usuario = '$idtusuario' AND dta_relatorio BETWEEN '2017-06-01' AND '2017-06-30'
                    ORDER BY tpo_produto, nme_produto ASC";
            $produtos = $dbh->query($sql6);
            foreach ($produtos as $produto6) {
                echo "<tr>" .
                    "<td>" . $produto6['nme_produto'] . "</td>" .
                    "<td>" . $produto6['qtd_produto'] . "</td>" .
                    "<td>" . $produto6['tpo_produto'] . "</td>" .
                    "<td>" . $produto6['med_produto'] . "</td>" .
                    "<td>" . $produto6['prc_produto'] . "</td>" .
                    "<td>" . $produto6['dta_relatorio'] . "</td>" .
                    "</tr>";
            }
            ?>
            </tbody>
        </table>

    </div>
</section>
<section>
    <h3>Compras de Julho</h3>
    <div class="tbl-header">

        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Tipo</th>
                <th>Medida</th>
                <th>Preco</th>
                <th>Data</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php

            $idtusuario = $_SESSION['idt_usuario'];

            $sql7 = "SELECT nme_produto, qtd_produto, tpo_produto, med_produto, prc_produto, dta_relatorio 
                    FROM `tb_produto` 
                    JOIN ta_relatorio ON idt_produto = cod_produto
                    JOIN tb_usuario ON idt_usuario = cod_usuario 
                    WHERE idt_usuario = '$idtusuario' AND dta_relatorio BETWEEN '2017-07-01' AND '2017-07-31'
                    ORDER BY tpo_produto, nme_produto ASC";
            $produtos = $dbh->query($sql7);
            foreach ($produtos as $produto7) {
                echo "<tr>" .
                    "<td>" . $produto7['nme_produto'] . "</td>" .
                    "<td>" . $produto7['qtd_produto'] . "</td>" .
                    "<td>" . $produto7['tpo_produto'] . "</td>" .
                    "<td>" . $produto7['med_produto'] . "</td>" .
                    "<td>" . $produto7['prc_produto'] . "</td>" .
                    "<td>" . $produto7['dta_relatorio'] . "</td>" .
                    "</tr>";
            }
            ?>
            </tbody>
        </table>

    </div>
</section>
<section>
    <h3>Compras de Agosto</h3>
    <div class="tbl-header">

        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Tipo</th>
                <th>Medida</th>
                <th>Preco</th>
                <th>Data</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php

            $idtusuario = $_SESSION['idt_usuario'];

            $sql8 = "SELECT nme_produto, qtd_produto, tpo_produto, med_produto, prc_produto, dta_relatorio 
                    FROM `tb_produto` 
                    JOIN ta_relatorio ON idt_produto = cod_produto
                    JOIN tb_usuario ON idt_usuario = cod_usuario 
                    WHERE idt_usuario = '$idtusuario' AND dta_relatorio BETWEEN '2017-08-01' AND '2017-08-31'
                    ORDER BY tpo_produto, nme_produto ASC";
            $produtos = $dbh->query($sql8);
            foreach ($produtos as $produto8) {
                echo "<tr>" .
                    "<td>" . $produto8['nme_produto'] . "</td>" .
                    "<td>" . $produto8['qtd_produto'] . "</td>" .
                    "<td>" . $produto8['tpo_produto'] . "</td>" .
                    "<td>" . $produto8['med_produto'] . "</td>" .
                    "<td>" . $produto8['prc_produto'] . "</td>" .
                    "<td>" . $produto8['dta_relatorio'] . "</td>" .
                    "</tr>";
            }
            ?>
            </tbody>
        </table>

    </div>
</section>
<section>
    <h3>Compras de Setembro</h3>
    <div class="tbl-header">

        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Tipo</th>
                <th>Medida</th>
                <th>Preco</th>
                <th>Data</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php

            $idtusuario = $_SESSION['idt_usuario'];

            $sql9 = "SELECT nme_produto, qtd_produto, tpo_produto, med_produto, prc_produto, dta_relatorio 
                    FROM `tb_produto` 
                    JOIN ta_relatorio ON idt_produto = cod_produto
                    JOIN tb_usuario ON idt_usuario = cod_usuario 
                    WHERE idt_usuario = '$idtusuario' AND dta_relatorio BETWEEN '2017-09-01' AND '2017-09-30'
                    ORDER BY tpo_produto, nme_produto ASC";
            $produtos = $dbh->query($sql9);
            foreach ($produtos as $produto9) {
                echo "<tr>" .
                    "<td>" . $produto9['nme_produto'] . "</td>" .
                    "<td>" . $produto9['qtd_produto'] . "</td>" .
                    "<td>" . $produto9['tpo_produto'] . "</td>" .
                    "<td>" . $produto9['med_produto'] . "</td>" .
                    "<td>" . $produto9['prc_produto'] . "</td>" .
                    "<td>" . $produto9['dta_relatorio'] . "</td>" .
                    "</tr>";
            }
            ?>
            </tbody>
        </table>

    </div>
</section>
<section>
    <h3>Compras de Outubro</h3>
    <div class="tbl-header">

        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Tipo</th>
                <th>Medida</th>
                <th>Preco</th>
                <th>Data</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php

            $idtusuario = $_SESSION['idt_usuario'];

            $sql10 = "SELECT nme_produto, qtd_produto, tpo_produto, med_produto, prc_produto, dta_relatorio 
                    FROM `tb_produto` 
                    JOIN ta_relatorio ON idt_produto = cod_produto
                    JOIN tb_usuario ON idt_usuario = cod_usuario 
                    WHERE idt_usuario = '$idtusuario' AND dta_relatorio BETWEEN '2017-10-01' AND '2017-10-31'
                    ORDER BY tpo_produto, nme_produto ASC";
            $produtos = $dbh->query($sql10);
            foreach ($produtos as $produto10) {
                echo "<tr>" .
                    "<td>" . $produto10['nme_produto'] . "</td>" .
                    "<td>" . $produto10['qtd_produto'] . "</td>" .
                    "<td>" . $produto10['tpo_produto'] . "</td>" .
                    "<td>" . $produto10['med_produto'] . "</td>" .
                    "<td>" . $produto10['prc_produto'] . "</td>" .
                    "<td>" . $produto10['dta_relatorio'] . "</td>" .
                    "</tr>";
            }
            ?>
            </tbody>
        </table>

    </div>
</section>
<section>
    <h3>Compras de Novembro</h3>
    <div class="tbl-header">

        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Tipo</th>
                <th>Medida</th>
                <th>Preco</th>
                <th>Data</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php

            $idtusuario = $_SESSION['idt_usuario'];

            $sql11 = "SELECT nme_produto, qtd_produto, tpo_produto, med_produto, prc_produto, dta_relatorio 
                    FROM `tb_produto` 
                    JOIN ta_relatorio ON idt_produto = cod_produto
                    JOIN tb_usuario ON idt_usuario = cod_usuario 
                    WHERE idt_usuario = '$idtusuario' AND dta_relatorio BETWEEN '2017-11-01' AND '2017-11-30'
                    ORDER BY tpo_produto, nme_produto ASC";
            $produtos = $dbh->query($sql11);
            foreach ($produtos as $produto11) {
                echo "<tr>" .
                    "<td>" . $produto11['nme_produto'] . "</td>" .
                    "<td>" . $produto11['qtd_produto'] . "</td>" .
                    "<td>" . $produto11['tpo_produto'] . "</td>" .
                    "<td>" . $produto11['med_produto'] . "</td>" .
                    "<td>" . $produto11['prc_produto'] . "</td>" .
                    "<td>" . $produto11['dta_relatorio'] . "</td>" .
                    "</tr>";
            }
            ?>
            </tbody>
        </table>

    </div>
</section>
<section>
    <h3>Compras de Dezembro</h3>
    <div class="tbl-header">

        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Tipo</th>
                <th>Medida</th>
                <th>Preco</th>
                <th>Data</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php

            $idtusuario = $_SESSION['idt_usuario'];

            $sql12 = "SELECT nme_produto, qtd_produto, tpo_produto, med_produto, prc_produto, dta_relatorio 
                    FROM `tb_produto` 
                    JOIN ta_relatorio ON idt_produto = cod_produto
                    JOIN tb_usuario ON idt_usuario = cod_usuario 
                    WHERE idt_usuario = '$idtusuario' AND dta_relatorio BETWEEN '2017-12-01' AND '2017-12-31'
                    ORDER BY tpo_produto, nme_produto ASC";
            $produtos = $dbh->query($sql12);
            foreach ($produtos as $produto12) {
                echo "<tr>" .
                    "<td>" . $produto12['nme_produto'] . "</td>" .
                    "<td>" . $produto12['qtd_produto'] . "</td>" .
                    "<td>" . $produto12['tpo_produto'] . "</td>" .
                    "<td>" . $produto12['med_produto'] . "</td>" .
                    "<td>" . $produto12['prc_produto'] . "</td>" .
                    "<td>" . $produto12['dta_relatorio'] . "</td>" .
                    "</tr>";
            }

            ?>
            </tbody>
        </table>

    </div>
</section>
</body>
</html>

