<?php
    include "config.php";

    if (isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $con = connect();

        $query = "SELECT * FROM user WHERE username = '$username'";
        $result = $con->query($query);

        if ($result->num_rows > 0) {
            echo "<script>alert('username already exists'); window.location.href='registration.html';</script>";
        } else {
            $sql = "INSERT INTO user (name, username, password, admin) VALUES ('$name', '$username', '$password', 0)";
            $result = $con->query($sql);
        }
    } else {
        echo "<script>alert('all fields must be filled'); window.location.href='registration.html';</script>";
    }
?>