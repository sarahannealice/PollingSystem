<?php
    include "config.php";
    session_start();

    if (isset($_POST['candidate_name'])) {
        $con = connect();
        $name = $_POST['candidate_name'];

        //collects data from database
        $query = "SELECT * FROM candidates WHERE name = '$name'";
        $result = $con->query($query);

        //checks if candidate already exists
        if ($result->num_rows > 0) {
            echo "<script>alert('candidate already registered'); window.location.href='candidate.php';</script>";
        } else {
            //registers new candidate and updates if user can vote or not
            $sqlCan = "INSERT INTO `candidates` (name) VALUES ('$name')";
            $result = $con->query($sqlCan);
            echo "<script>alert('candidate successfully registered'); window.location.href='candidate.php';</script>";
        }
    }
?>