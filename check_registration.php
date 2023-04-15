<?php
    include "config.php";
    include "validations.php";

    if (isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $con = connect();

        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = $con->query($query);

        if ($result->num_rows > 0) {
            echo "<script>alert('username already exists'); window.location.href='signup.html';</script>";
        } else if (!validName($name)) {
            echo "<script>alert('name must be between 3 and 20 letters long'); window.location.href='signup.html';</script>";
        } else if (!validUsername($username)) {
            echo "<script>alert('username must be between 3 and 20 characters long (excluding special characters)'); 
                    window.location.href='signup.html';</script>";
        } else if (!validPassword($password)) {
            echo "<script>alert('passwords must be between 5 and 20 characters long (excluding special characters)'); 
                    window.location.href='signup.html';</script>";
        } else {
            $sql = "INSERT INTO users (name, username, password, admin) VALUES ('$name', '$username', '$password', 0)";
            $result = $con->query($sql);
            header("location: login.php");
        }
    } else {
        echo "<script>alert('all fields must be filled'); window.location.href='signup.html';</script>";
    }
?>