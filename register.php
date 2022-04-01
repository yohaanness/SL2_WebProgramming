<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<style>
    *{
        font-family : sans-serif;
    }
    body{
        background-color: #c2f0f7;
    }
    caption{
        font-size: 25pt;
        margin-top: 20px;
        margin-bottom: 40px;
    }
    td{
        width: fit-content;
        padding: 15px; 
        vertical-align: top;
        text-align: left;
    }
    input{
        width: 20vw;
    }
    div{
        margin-top: 10px;
        display: flex;
        justify-content: right;
        margin-right: 50px;
    }
    a{
        text-align: center;
        background: #adf59f;
        margin-inline: 10px;
        text-decoration: none;
        color: black;
        border: solid 2px black;
        border-radius: 3px;
        box-shadow: 2px 2px rgba(0,0,0,0.4);
        width: 100px;
        cursor: pointer;
    }
    a+input{
        text-align: center;
        background: #fdd7ac;
        border: none;
        border: solid 2px black;
        border-radius: 3px;
        box-shadow: 2px 2px rgba(0,0,0,0.4);
        width: 100px;
        cursor: pointer;
        font-size: 10pt;
    }
</style>

<body>
    <form action="register-process.php" method="post" enctype="multipart/form-data">
        <table>
            <caption>Register</caption>
            <tr>
                <td>Nama Depan</td>
                <td><input type="text" name="namadepan"></td>
                <td>Nama Tengah</td>
                <td><input type="text" name="namatengah"></td>
                <td>Nama Belakang</td>
                <td><input type="text" name="namabelakang"></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td><input type="text" name="tempatlahir"></td>
                <td>Tgl Lahir</td>
                <td><input type="date" name="tgllahir"></td>
                <td>NIK</td>
                <td><input type="text" name="nik"></td>      
            </tr>
            <tr>
                <td>Warga Negara</td>
                <td><input type="text" name="warganegara"></td>
                <td>Email</td>
                <td><input type="email" name="email"></td>
                <td>No HP</td>
                <td><input type="text" name="nohp"></td>      
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" id="" cols="36" rows="10" ></textarea></td>
                <td>Kode Pos</td>
                <td><input type="text" name="kodepos"></td>
                <td>Foto Profil</td>
                <td><input type="file" name="fotoprofil"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td ><input type="text" name="username" ></td>
                <td>Password 1</td>
                <td><input type="password" name="password1"></td>
                <td>Password 2</td>
                <td><input type="password" name="password2"></td>
            </tr>
        </table>
        <div>
            <a href="welcome.php">Kembali</a>
            <input class="submitReg" type="submit" name="submitRegister" value="Register">
        </div>
    </form>
</body>
</html>