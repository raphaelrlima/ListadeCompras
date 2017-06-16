<?php
/**
 * Created by PhpStorm.
 * User: rapha
 * Date: 15/06/2017
 * Time: 16:21
 */
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (!isset($_POST['logar'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Blank space";
    }
}else
    {
// Define $username and $password
        $username=$_POST['username'];
        $password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
        require_once ('config.php');
        $dbh= new mysqli(server, user, pass, database);
        if ($dbh->connect_errno) {
            echo "<p>MySQL error no {$dbh->connect_errno} : {$dbh->connect_error}</p>";
            exit();
        }
// To protect MySQL injection for Security purpose


// SQL query to fetch information of registerd users and finds user match.

        $query = "SELECT * FROM tb_usuario WHERE lgn_usuario = '$username' AND pwd_usuario = '$password'";
        $rows = mysqli_num_rows($dbh->query($query));
        if ($rows == 1) {
            $_SESSION['lgn_usuario']=$username; // Initializing Session
            header("location: index.php"); // Redirecting To Other Page
        } else {
            $error = "Username or Password is invalid";
        }
    }

?>