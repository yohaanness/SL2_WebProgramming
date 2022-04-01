<?php
    if(isset($_SESSION['usernamelogin'])) header('location:home.php');
    header('location:welcome.php');
?>