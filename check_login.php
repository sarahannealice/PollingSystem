<?php
    include "config.php";
    session_start();

    //checks if username & password are set
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $con = connect();

        //storing username in session
        $_SESSION['user'] = $username;

        //collects all rows where username-password equals user input
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $data = $con->query($query);

        //if any rows return, they're in the system
        if ($data->num_rows > 0) {
            $userData = $data->fetch_assoc();

            //checks if username-password are correct credentials
            if ($userData['username'] == $username && $userData['password'] == $password) {
                if ($userData['admin'] == 0) {
                    header("location: home.php");
                } else
                    header("location: home_admin.php");
            } else {
                //https://stackoverflow.com/a/29815470
                echo "<script>alert('an error has occurred. please try again'); window.location.href='login.php';</script>";
            }
        } else {
            echo "<script>alert('invalid username or password'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('invalid username or password'); window.location.href='login.php';</script>";
    }
?>