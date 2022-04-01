<?php
    session_start();
    require_once("config.php");
    $stmt = $connection->prepare("SELECT * FROM users WHERE username = ?");
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
    <form action="editprofile-process.php" method="post" enctype="multipart/form-data">
        <table>
            <caption>Edit Profile</caption>
            <tr>
                <td>Nama Depan</td>
                <td><input type="text" name="namadepan" value="<?php echo $data['nama_depan'];?>"></td>
                <td>Nama Tengah</td>
                <td><input type="text" name="namatengah" value="<?php echo $data['nama_tengah'];?>"></td>
                <td>Nama Belakang</td>
                <td><input type="text" name="namabelakang" value="<?php echo $data['nama_belakang'];?>"></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td><input type="text" name="tempatlahir" value="<?php echo $data['tempat_lahir'];?>"></td>
                <td>Tgl Lahir</td>
                <td><input type="date" name="tgllahir" value="<?php echo $data['tanggal_lahir'];?>"></td>
                <td>NIK</td>
                <td><input type="text" name="nik" value="<?php echo $data['nik'];?>"></td>      
            </tr>
            <tr>
                <td>Warga Negara</td>
                <td><input type="text" name="warganegara" value="<?php echo $data['warga_negara'];?>"></td>
                <td>Email</td>
                <td><input type="email" name="email" value="<?php echo $data['email'];?>"></td>
                <td>No HP</td>
                <td><input type="text" name="nohp" value="<?php echo $data['no_hp'];?>"></td>      
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" id="" cols="36" rows="10" ><?php echo $data['alamat'];?></textarea></td>
                <td>Kode Pos</td>
                <td><input type="text" name="kodepos" value="<?php echo $data['kode_pos'];?>"></td>
                <td>Foto Profil</td>
                <td><input type="file" name="fotoprofil"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td ><input type="text" name="username" value="<?php echo $data['username'];?>"  readonly></td>
                <td>Password 1</td>
                <td><input type="password" name="password1" value="<?php echo base64_decode($data['password']);?>"></td>
                <td>Password 2</td>
                <td><input type="password" name="password2" value="<?php echo base64_decode($data['password']);?>"></td>
            </tr>
        </table>
        <div>
            <a href="profile.php">Kembali</a>
            <input class="submitReg" type="submit" name="submitEdit" value="Submit">
        </div>
    </form>
</body>
</html>