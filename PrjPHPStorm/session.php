<?php
/**
 * Created by PhpStorm.
 * User: rapha
 * Date: 15/06/2017
 * Time: 15:27
 */

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
require_once ('config.php');

$dbh = new mysqli(server, user, pass, database);
# check connection
if ($dbh->connect_errno) {
    echo "<p>MySQL error no {$dbh->connect_errno} : {$dbh->connect_error}</p>";
    exit();
}
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['lgn_usuario'];
// SQL Query To Fetch Complete Information Of User
$ses_sql = "SELECT lgn_usuario FROM tb_usuario WHERE lgn_usuario = '$user_check'";
$row = $ses_sql->fetchAll();
$login_session =$row['lgn_usuario'];

if(!isset($login_session)){
    header('Location: index.php'); // Redirecting To Home Page
}
?>