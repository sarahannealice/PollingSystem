<?php
    function connect() {
        //database configuration
        $host = "localhost";
        $username = "root";
        $password = "Password";
        $dbname = "data_source";

        //create database connection
        $con = new mysqli($host, $username, $password, $dbname);

        //check connection
        if ($con->connect_error) {
            die("connection failed: " . $con->connect_error);
        }

        return $con;
    }
?>