<?php
    include "config.php";
    session_start();
    $con = connect();

    //gets boolean if user has voted already
    $sql = "SELECT voted FROM users WHERE username = '".$_SESSION['user']."'";
    $userVoted = $con->query($sql);

    //checks if user has already voted
    if ($userVoted->fetch_assoc() === true) {
        echo "<script>alert('user already voted. unable to vote twice'); window.location.href='login.php';</script>";
        header("location: thank_you.php");
    } else {
        echo "user: " . $_SESSION['user'];
        //updates user vote count -- unable to vote afterwards
        $sql = "UPDATE users SET voted = true WHERE username = '".$_SESSION['user']."'";
        $result = $con->query($sql);

        //updates user vote history
        $sql = "UPDATE users SET history = 'test' WHERE username = '".$_SESSION['user']."'";
        $result = $con->query($sql);
        header("location: thank_you.php");
    }
?>