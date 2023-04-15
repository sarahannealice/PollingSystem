<?php
    include "config.php";
    session_start();
    $con = connect();

    //gets boolean if user has voted
    $sql = "SELECT voted FROM users WHERE username = '".$_SESSION['user']."'";
    $result = $con->query($sql);
    $user = $result->fetch_assoc();
    $vote = $user['voted'];

    //checks if user has already voted
    if ($vote == 1) {
        echo "<script>alert('unable to vote twice'); window.location.href='thank_you.php';</script>";
    } else if ($vote == 0) {
        header("location: dashboard.php");

//        echo "user: " . $_SESSION['user'];
//        //updates user vote count -- unable to vote afterwards
//        $sql = "UPDATE users SET voted = true WHERE username = '".$_SESSION['user']."'";
//        $result = $con->query($sql);
//
//        //updates candidates votes
//        $query = "UPDATE candidates SET votes =  votes + 1 WHERE name = '".$_SESSION['user']."'";
//        $query = $con->query($query);

        //updates user vote history
//        $sql = "UPDATE users SET history = 'test' WHERE username = '".$_SESSION['user']."'";
//        $result = $con->query($sql);
    }
?>
