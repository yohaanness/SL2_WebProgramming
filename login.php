<?php
    session_start();
    $usernameErr = $passwordErr = "";
    unset($_SESSION['usernamelogin']);
    unset($_SESSION['passwordlogin']);


    
    if(!empty($_SESSION['errorlogin'])){
        $usernameErr = $passwordErr = $_SESSION['errorlogin'];
        unset($_SESSION['errorlogin']);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!empty($_POST['username']) && !empty($_POST['password'])){
            require_once("config.php");
            
            $stmt = $connection->prepare("SELECT username, password FROM users WHERE username = ?");

            $stmt->bind_param("s", $_POST['username']);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            $decode_pass = base64_decode($data['password']);
            if(empty($data)){
                $usernameErr = "*Username belum terdaftar";
            }else{
                
                if($_POST['password'] == $decode_pass){
                    echo "<script>";
                        echo "alert('Login berhasil')";
                    echo "</script>";
            
                    echo "<script>";
                        $_SESSION['usernamelogin'] = $_POST['username'];
                        echo "window.location = 'home.php'";
                    echo "</script>";
                }else{
                    echo "<script>";
                        echo "alert('Username dan password tidak cocok!')";
                    echo "</script>";
            
                    echo "<script>";
                        echo "window.location = 'login.php'";
                    echo "</script>";
                }
            }
            $stmt->close();
        }
        else{
            if(empty($_POST['username'])){
                $usernameErr = "*Username tidak boleh kosong!";
            }
            if(empty($_POST['password'])){
                $passwordErr = "*Password tidak boleh kosong!";
            }
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
    *{
        font-family : sans-serif;
    }
    body{
        background-color: #fbfdac;
        text-align: center;
        width: 100%;
        display: flex;
        align-items: center;
        flex-direction: column;
    }
    h1{
        margin: 50px 0px;
        margin-bottom: 80px;
    }
    form, table{
        display: flex;
        align-items: center;
        flex-direction: column;
    }
    form{
        background-color: #ace6fd;
        padding: 30px;
        width: 50vw;
        height: 30vh;
        align-self: center;
        position: relative;
    }
    table{
        margin-top: 30px;
    }
    td{
        padding-right: 15px;
        font-size: 15pt
        padding-block: 80px;
    }
    tr{
        margin: 20px;
    }
    input[type="text"], input[type="password"]{
        width: 300px;
    }
    a, input[type="submit"]{
        margin-inline: 15px;
        padding-block: 3px;
        text-decoration: none;
        color : black;
        background-color: #fdd7ac;
        border: none;
        width: fit-content;
        max-width: 100px;
        padding-inline: 20px;
        font: 15pt sans-serif;
        cursor: pointer;
    }
    input[type="submit"]{
        background-color: #adf59f;
    }
    div{
        position: absolute;
        right: 180px;
        bottom: 40px;
    }
    .error{ 
        height: 40px;
        vertical-align: top;
        text-align: left;
        color: red;
    }
</style>
<body>
    <h1>Login</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" id=""></td>
            </tr>
            <tr class="error">
                <td></td>
                <td>
                    <span><?php echo $usernameErr ?></span>
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" id=""></td>
            </tr>
            <tr class="error">
                <td></td>
                <td>
                    <span><?php echo $passwordErr ?></span>
                </td>
            </tr>
        </table>
        <div>
            <input class="submitLogin" type="submit" name="submitLogin" value="Login">
            <a href="welcome.php">Kembali</a>
        </div>
    </form>
</body>
</html>