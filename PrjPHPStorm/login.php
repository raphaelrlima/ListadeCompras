<?php
/**
 * Created by PhpStorm.
 * User: uniceub
 * Date: 23/05/17
 * Time: 18:11
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pag Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="CSS/login/login.css" rel="stylesheet"/>

</head>
<body>

<div class="login-page">
    <div class="form">

        <form class="register-form">
            <input type="text" placeholder="name"/>
            <input type="password" placeholder="password"/>
            <input type="text" placeholder="email address"/>
            <button>create</button>
            <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form>
        <form class="login-form">
            <input type="text" placeholder="username"/>
            <input type="password" placeholder="password"/>
            <button>login</button>
            <p class="message">Not registered? <a href="#">Create an account</a></p>
        </form>

    </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="JS/login.js"></script>
</body>
</html>
