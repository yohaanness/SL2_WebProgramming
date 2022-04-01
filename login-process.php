<?php
    session_start();

    if(isset($_POST['submitLogin']) && 
    isset($_SESSION['usernameSession']) &&
    isset($_SESSION['password1Session']) &&
    isset($_SESSION['password2Session'])){
        // print_r($_SESSION['password1Session'].$_SESSION['password2Session'].$_POST['password']);
        if(($_SESSION['usernamelogin'] == $_SESSION['usernameSession']) &&
         (($_SESSION['passwordlogin'] == $_SESSION['password1Session']) || 
         ($_SESSION['passwordlogin'] == $_SESSION['password2Session']))){
            header("location:home.php");
        }else{
            
            $_SESSION['errorlogin'] = "*Username dan password tidak valid!";
            header("location:login.php");
        }
    }else{
        echo "Login Gagal! Pastikan kolom username dan password sesuai<br>";
        echo "<a href='login.php'>Back to Login Page</a><br>";
    }
    

?>