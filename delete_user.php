<?php
    include "config.php";
    session_start();
    $con = connect();

    $user = $_POST['user'];

    //check for username in database
    $sql = "SELECT * FROM users WHERE username = '$user'";
    $result = $con->query($sql);

    //checks if user exists
    if ($result->num_rows > 0) {
        $delete = "DELETE FROM users WHERE users.username = '$user'";
        $result = $con->query($delete);
        echo "<script>alert('user successfully deleted'); window.location.href='edit_user.php';</script>";
    } else {
        echo "<script>alert('user doesn\'t exist'); window.location.href='edit_user.php';</script>";
    }
?>