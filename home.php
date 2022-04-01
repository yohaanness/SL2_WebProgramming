<?php
    session_start();
    if(!isset($_SESSION['usernamelogin'])){
        echo "<script>";
        echo "window.location = 'login.php'";
        echo "</script>";
    }

    require_once("config.php");
    $stmt = $connection->prepare("SELECT nama_depan, nama_tengah, nama_belakang FROM users WHERE username = ?");
    $stmt->bind_param("s", $_SESSION['usernamelogin']);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<style>
    *{
        font-family : sans-serif;
    }
    body{
        margin: 0px;
    }
    nav{
        height: 50px;
        background-color: #f9ffca;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-inline: 10px;
        margin: 0px;
    }
    a{
        text-decoration: none;
        margin-inline: 20px;
        color: black;
    }
    a:first-child{
        text-decoration: underline;
    }
    main{
        background-color: #cad1ff;
        margin: 0px;
        height: 90vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    p{
        margin: 0px;
    }
    span{
        font-weight: bold;
    }
</style>
<body>
    <nav>
        <p>Aplikasi Pengelolaan Keuangan</p>
        <div>
            <a href="home.php">Home</a>
            <a href="profile.php">Profile</a>
        </div>
        <a href="logout.php">Logout</a>
    </nav>
    <main>
            <!-- <p>Halo <span><?php echo $_SESSION['namadepanSession']." ".$_SESSION['namatengahSession']." ".$_SESSION['namabelakangSession']; ?></span>, Selamat Datang di Aplikasi Pengelolaan Keuangan</p> -->
            <p>Halo <span><?php echo $data['nama_depan']." ".$data['nama_tengah']." ".$data['nama_belakang']; ?></span>, Selamat Datang di Aplikasi Pengelolaan Keuangan</p>    
    </main>
</body>
</html>