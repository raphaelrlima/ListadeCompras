<?php
/**
 * Created by PhpStorm.
 * User: rapha
 * Date: 31/05/2017
 * Time: 22:23
 */
    $nmeUsuario = $_REQUEST["nmeUsuario"];
    $lgnUsuario = $_REQUEST["lgnUsuario"];
    $pwdUsuario = $_REQUEST["pwdUsuario"];
    $emlUsuario = $_REQUEST["emlUsuario"];

    $exists=0;
    $result= $dbh->query("SELECT lgn_usuario FROM tb_usuario WHERE lgn_usuario = '$nmeUsuario' LIMIT 1");
    if ($result->num_rows == 1) {
        $exists = 1;
        $result = $dbh->query("SELECT eml_usuario from tb_usuario WHERE eml_usuario = '$emlUsuario' LIMIT 1");
        if ($result->num_rows == 1) $exists = 2;
    } else {
        $result = $dbh->query("SELECT eml_usuario from tb_usuario WHERE eml_usuario = '$emlUsuario' LIMIT 1");
        if ($result->num_rows == 1) $exists = 3;
    }

    if ($exists == 1) echo "<p>Username already exists!</p>";
    else if ($exists == 2) echo "<p>Username and Email already exists!</p>";
    else if ($exists == 3) echo "<p>Email already exists!</p>";
    else {
        $sql1 = "INSERT INTO tb_usuario (nme_usuario, lgn_usuario, pwd_usuario, eml_usuario) VALUES ('$nmeUsuario','$lgnUsuario','$pwdUsuario','$emlUsuario')";

        $result1 = $dbh->query($sql1);
        if ($result1){
            echo "<p>Usuário Inserido com Sucesso</p>";
        }else{
            echo "<p>MySQL ERRO no {$dbh->errorInfo()}</p>";
            exit();
        }
    }

?>