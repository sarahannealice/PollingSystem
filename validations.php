<?php
    //validates name input
    function validName($name) {
        $regex = "/^[a-zA-Z]{3,20}$/";
        return preg_match($regex, $name);
    }

    //validates username input
    function validUsername($name) {
        $regex = "/^[a-zA-Z0-9]{3,20}$/";
        return preg_match($regex, $name);
    }

    //validates password input
    function validPassword($name) {
        $regex = "/^[a-zA-Z0-9]{3,20}$/";
        return preg_match($regex, $name);
    }
?>