<?php
    //validates name input
    function validName($name) {
        $regex = "/^[a-zA-Z]{3,20}$/";
        return preg_match($regex, $name);
    }

    //validates name input
    function validUsername($name) {
        $regex = "/^[a-zA-Z0-9]{3,20}$/";
        return preg_match($regex, $name);
    }

    //validates name input
    function validPassword($name) {
        $regex = "/^[a-zA-Z0-9]{3,20}$/";
        return preg_match($regex, $name);
    }

    function addVote($con, $username, $vote) {
        //updates user vote count -- unable to vote afterwards
        $query = "UPDATE users SET voted = '1' WHERE username = '$username'";
        $con->query($query);

        //updates candidates votes
        $query = "UPDATE candidates SET votes = votes + 1 WHERE name = '$vote'";
        $con->query($query);
        header("location: thank_you.php");
    }
?>