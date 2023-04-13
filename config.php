<?php
    function connect() {
        //database configuration
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "data_source1";

        //create database connection
        $data = mysqli_connect($host, $username, $password, $dbname);
        $con = new mysqli($host, $username, $password, $dbname);

        //check connection
        if ($data === true) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $sql = "SELECT * FROM user_credentials WHERE username = ? AND password = ?";

                $result = mysqli_query($sql);
                $row = mysqli_fetch_array($result);

                if ($row['admin'] == 1) {
                    header("location: panel_admin.php");
                } else if ($row['admin'] == 0) {
                    header("location: dashboard.php");
                } else {
                    echo "invalid username or password";
                }
            }
        } else {
            die("connection failed");
        }
    }
?>