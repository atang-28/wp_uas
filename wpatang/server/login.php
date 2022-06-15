<?php

session_start();
$salah = "";
if(isset($_GET["act"])){
    if($_GET["act"] == "logout"){
        session_destroy();
    }
}

if(isset($_SESSION["login"])){
    header("location: dassboard.php");
}
    if(isset($_POST["user"])){
        $usr = $_POST["user"];
        $password = md5($_POST["pwd"]);
        include_once("dbkoneksi2.php");

        $sql = "SELECT username, pass FROM tbadmin WHERE username='$usr' ";
        $hsl = mysqli_query($cnn,$sql);
        if($hsl->num_rows > 0 ) {
            $row = mysqli_fetch_assoc($hsl);
            $pass = $row["pass"];
            if($password == $pass){
                $_SESSION["login"] = md5($pass);
                $_SESSION["user"] = $usr;
                header("location: dassboard.php");
            }

        } else{
            $salah = "Username atau Password Tidak Sesuai";

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
<body>
    <h3>Form Login</h3>
    <?=$salah;?>
    <form action="login.php" method="post">
        <label for="user">Username</label>
        <input type="text" name="user" id="user">
        <br><br>
        <label for="pwd">Password</label>
        <input type="password" name="pwd" id="pwd">
        <br><br>
        <button type="submit" name="login"> Login </button>
    </form>
    
</body>
</html>