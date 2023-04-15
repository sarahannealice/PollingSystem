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
        echo "<script>alert('unable to vote twice'); window.location.href='thank_you.html';</script>";
    } else if ($vote == 0) {
        header("location: dashboard.php");
    }
?>
