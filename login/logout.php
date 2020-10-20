<?php 
require 'database.php';

if (isset ($_COOKIE['user'])) {
    $token = mysqli_real_escape_string($link, $_COOKIE['user']);
    $q = "DELETE FROM cookies WHERE token='$token'";
    mysqli_query($link, $q);
    setcookie('user',$token, time() -100);
} else {
    header('Location: index.php');
}
?>

<html>
    <head> 
        <meta charset='utf-8'>
        <title> My Pantupage! </title>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
        <header>
            <h1>Cerraste la chechion pinche putito</h1>
            <a href='/login'>Si me haces click volvemos al INDEX</a>
            <br><img src='public\kitty3.gif'>
        </header>
    </body>
</html>