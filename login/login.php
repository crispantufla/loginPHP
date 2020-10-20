<?php
require 'database.php';
?>
<html>
<head>
    <meta charset="utf-8">
    <title> Login! </title>
    <link rel="stylesheet" href="style.css">
</head>
<header>
    <a href='/login'>Si me haces click volvemos al INDEX</a>
</header>
<body>
<?php
if (isset ($_COOKIE['user'])) { 
    include 'noPass.html';
} else {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = mysqli_real_escape_string($link, $_POST['email']);
            $password = $_POST['password'];
            $q = "SELECT * FROM users WHERE email='$email'";
            if ($result = mysqli_query($link, $q)) {
                $hash = mysqli_fetch_assoc($result);
                if (!empty($hash)) {
                    if (password_verify($password, $hash['password'])) {
                        $bytes = random_bytes(24);
                        $token = bin2hex($bytes);
                        setcookie("user", $token, time() + 84600);
                        $id = $hash['id'];
                        $q2 = "INSERT INTO cookies (user, token) VALUES ('$id', '$token')"; //hacerlo con la id y referenciar a la ide de la tabla usuarios
                        mysqli_query($link, $q2);
                        header('Location: index.php');
                    } else {
                        echo 'La contraseña no es válida.';
                    }
                } else {
                    echo "Usuario incorrecto!";
                }
            }
        } else {
            echo "Te falto poner algo pinche putito, arreglatelas macho";
        }
    }
    include 'formularioLogin.html';
}
?>
</body>
</html>