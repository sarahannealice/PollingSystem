<?php
    include "config.php";
    session_start();
    $con = connect();

    echo "user: " . $_SESSION['user'];

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>

    <body>
        <div class="container">
            <div class="register"><a href="logout.php">Logout</a></div>
            <h1>Thank you!</h1>
            <!--https://www.w3schools.com/charsets/ref_emoji_smileys.asp-->
            <h3>Your vote has been collected &#128516;</h3>
        </div>
    </body>
</html>