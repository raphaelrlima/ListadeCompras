<?php
/**
 * Created by PhpStorm.
 * User: rapha
 * Date: 15/06/2017
 * Time: 15:17
 */

session_start();
$_SESSION['loggedin']= false;
if(session_destroy()) // Destroying All Sessions
{
    header("Location: login.php"); // Redirecting To Home Page

}
?>