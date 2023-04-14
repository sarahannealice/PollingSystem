<?php
    include "config.php";
    session_start();

    if (isset($_POST['candidate_name'])) {
        $con = connect();
        $name = $_POST['candidate_name'];

        //grabs current user info to later check if admin or not
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM users WHERE id = '$id'";
        $result = $con->query($sql);
        $user = $result->fetch_assoc();

        $admin = $user['admin'];

        //checks if candidate already exists
        $query = "SELECT * FROM candidates WHERE name = '$name'";
        $result = $con->query($query);

        if ($result->num_rows > 0) {
            echo "<script>alert('candidate already exists'); window.location.href='candidate.php';</script>";
        } else {
            //registers new candidate and updates if user can vote or not
            $sqlCan = "INSERT INTO `candidates` (name) VALUES ('$name')";
            $sqlUser = "UPDATE users SET registered = '1' WHERE users.id = '$id'";
            $result = $con->query($sqlCan);
            $update = $con->query($sqlUser);

            //sends user back to admin home page
            header("location: home_admin.php");
        }
    }

?>