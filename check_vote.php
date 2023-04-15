<?php
    include "config.php";
    session_start();
    $con = connect();

    //updates user vote count -- unable to vote afterwards
    $query = "UPDATE users SET voted = '1' WHERE username = '$username'";
    $con->query($query);

    //updates candidates votes
    $query = "UPDATE candidates SET votes = votes + 1 WHERE name = '$vote'";
    $con->query($query);
    header("location: thank_you.php");
?>