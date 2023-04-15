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
            $delete = "DELETE FROM candidates WHERE candidates.name = '$name'";
            $result = $con->query($delete);
            echo "<script>alert('candidate successfully removed'); window.location.href='candidate.php';</script>";
        } else {
            echo "<script>alert('candidate doesn\'t exist'); window.location.href='candidate.php';</script>";
        }
    }
?>