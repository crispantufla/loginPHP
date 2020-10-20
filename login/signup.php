<?php
include 'database.php';
?>

<html>
    <head> 
        <meta charset='utf-8'>
        <title> Sign UP! </title>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
        <header>
            <a href='/login'>Si me haces click volvemos al INDEX</a>
        </header>
        <?php
        if (isset ($_COOKIE['user'])) { 
            include 'noPass.html';
        } else {
            include 'formularioSingUp.html';
            if (!empty($_POST['email']) && !empty($_POST['password'])) {
                $email = mysqli_real_escape_string($link, $_POST['email']);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo 'Invalid email format';
                } else {
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $q = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
                mysqli_query($link, $q) or die(mysqli_error($link));
                header('Location: login.php');
                }
            }
        }
        ?>
    </body>
</html>