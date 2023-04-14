<?php
    include "config.php";

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $con = connect();

        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $data = $con->query($query);

        if ($data->num_rows > 0) {
            $userData = $data->fetch_assoc();

            if ($userData['username'] == $username && $userData['password'] == $password) {
                if ($userData['admin'] == 0) {
                    header("location: home.php");
                } else
                    header("location: home_admin.php");
            } else {
                //https://stackoverflow.com/a/29815470
                echo "<script>alert('an error has occurred. please try again'); window.location.href='login.html';</script>";
            }
        } else {
            echo "<script>alert('invalid username or password'); window.location.href='login.html';</script>";
        }
    } else {
        echo "<script>alert('invalid username or password'); window.location.href='login.html';</script>";
    }
?>