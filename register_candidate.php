<?php
    include "config.php";
    session_start();

    if (isset($_POST['candidate_name'])) {
        $con = connect();
        $name = $_POST['candidate_name'];

        //checks if candidate already exists
        $query = "SELECT * FROM candidates WHERE name = '$name'";
        $result = $con->query($query);

        if ($result->num_rows > 0) {
            echo "<script>alert('candidate already exists'); window.location.href='candidate.php';</script>";
        } else {
            //registers new candidate and updates if user can vote or not
            $sqlCan = "INSERT INTO `candidates` (name) VALUES ('$name')";
            $result = $con->query($sqlCan);
            echo "<script>alert('candidate successfully registered'); window.location.href='candidate.php';</script>";
        }
    }
?>