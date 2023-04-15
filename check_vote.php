<?php
    include "config.php";
    session_start();
    $con = connect();


    $vote = $_POST['vote'];

    //updates user vote count -- unable to vote afterwards
    $sql = "UPDATE users SET voted = true WHERE username = '".$_SESSION['user']."'";
    $result = $con->query($sql);

    //updates candidates votes
    $query = "UPDATE candidates SET votes =  votes + 1 WHERE name = '$vote'";
    $query = $con->query($query);

    //updates user vote history
    $sql = "UPDATE users SET choice = '$vote' WHERE username = '".$_SESSION['user']."'";
    $result = $con->query($sql);

    header("location: thank_you.html");
?>