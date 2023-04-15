<?php
    include "config.php";
    session_start();
//    $con = connect();
//
//    //updates user vote count -- unable to vote afterwards
//    $sql = "UPDATE users SET voted = true WHERE username = '".$_SESSION['user']."'";
//    $result = $con->query($sql);
//
//    //updates candidates vote count
//    $vote = $_POST['vote'];
//    echo "<script>alert('voted: ' + $vote);</script>";
//    $query = "UPDATE candidates SET votes =  votes + 1 WHERE name = '$vote'";
//    $query = $con->query($query);

    //updates user vote history
//    $sql = "UPDATE users SET history = '' WHERE username = '".$_SESSION['user']."'";
//    $result = $con->query($sql);


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