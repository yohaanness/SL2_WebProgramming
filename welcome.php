<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<style>
    *{
        font-family : sans-serif;
    }
    body{
        background-color: #e5edeb;
    }
    h3, h1{
        display: flex;
        justify-content: center;
        margin-bottom: 40px
    }
    h3{
        margin-top: 50px;
        margin-bottom: 200px;
    }
    .container{
        display: flex;
        justify-content: space-evenly;
    }
    .container a{
        background-color: #c6ed99;
        text-decoration: none;
        font-size: 20pt;
        padding: 20px;
        text-align: center;
        width: 90px;
        color: black;
    }
    .container a:first-child{
        background-color: #99d6ed;
    }

</style>
<body>
    <h3>Aplikasi Pengelolaan Keuangan</h3>
    <h1>Selamat Datang di Aplikasi Pengelolaan Keuangan</h1>
    <div class="container" >
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </div>
</body>
</html>