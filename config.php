<?php
    function connect() {
        //database configuration
        $localhost = "localhost";
        $username = "root";
        $password = "";
        $dbname = "data_source";

        //create database connection
        $con = new mysqli($localhost, $username, $password, $dbname);

        //check connection
        if ($con->connect_error) {
            die("connection failed: " . $con->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sql = "SELECT * FROM user_credentials WHERE username = ? AND password = ?";

            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);

            if ($row["usertype"] == "admin") {
                //header("location: ");
            } else if ($row["usertype"] == "officer") {
                //header("location: ");
            } else if ($row["usertype"] == "user") {
                header("location: ");
            } else {
                echo "invalid username or password";
            }
        }
    }
?>