<?php
    include "config.php";

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $con = connect();

        $query = "SELECT * FROM user_credentials WHERE username = '$username' AND password = '$password'";
        $data = $con->query($query);

        if ($data->num_rows > 0) {
            $userData = $data->fetch_assoc();

            if ($userData['username'] == $username && $userData['password'] == $password) {
                if ($userData['admin'] == 0) {
                    header("location: dashboard.php");
                } else
                    echo "<script>alert('login successful');</script>";
                    header("location: dashboard_admin.php");
            } else {
                echo "<script>alert('an error has occurred. please try again'); window.location.href='login.html';</script>";
            }
        } else {
            echo "<script>alert('invalid username or password'); window.location.href='login.html';</script>";
        }
    } else {
        echo "<script>alert('invalid username or password'); window.location.href='login.html';</script>";
    }
?>