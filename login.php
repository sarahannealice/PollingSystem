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
                if ($userData['admin'] == 0)
                    header("location: dashboard.php");
                else
                    header("location: dashboard_admin.php");
            } else {
                header("location: login.html");
            }
        } else {
            echo "incorrect username or password";
            header("location: login.html");
        }
    } else {
        header("location: login.html");
    }
?>