<html>
    <head> 
        <meta charset="utf-8">
        <title>My Pantupage!</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <?php 
    include 'database.php';

    if (isset ($_COOKIE['user'])) { ?>
        Por que no te vas un poco a la puta que te pario.
        <a href='logout.php'>Cerrar CHEHION</a> <?php
    } else {
        ?> OMG no estas logueado, por que no inichias chechion o creas una cuenta?
        <a href='signup.php'>Sign up</a> Or <a href='login.php'>Login</a><?php
    }
    ?>
        <h1>Welcome to my login page!</h1>
        <br><br><img src="public\kitty.gif">
    </body>
</html>