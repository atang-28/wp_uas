<?php
session_start();
if(isset($_SESSION["login"])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dassboard Page</title>
</head>
<body>
    <h3>Dassboard</h3>
    Selamat datang <?=$_SESSION['user'];?>,
    <br>
    <button><a href="login.php?act=logout">Log Out</a></button>

</body>
</html>

<?php
}else{
    header("location: login.php");
}
?>

