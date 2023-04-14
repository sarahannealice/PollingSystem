<?php
    function validName($name) {
        if (empty($name)) {
            $valid = false;
        } else if (preg_match("/^[a-zA-Z]{3,20}$/", $name)) {
            $valid = true;
        } else {
            $valid = false;
        }
        return $valid;
    }

    function validUsername($username) {
        if (empty($username)) {
            $valid = false;
        } else if (preg_match("/^[a-zA-Z0-9]{4,20}$/", $username)) {
            $valid = true;
        } else {
            $valid = false;
        }
        return $valid;
    }

    function getUser($con, $username, $password) {
        $query = "SELECT * FROM user_credentials WHERE username = '$username' AND password = '$password'";
        $userInfo = $con->query($query);
        return $userInfo;
    }
?>