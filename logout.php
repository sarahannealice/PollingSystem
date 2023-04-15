<?php
    //destroys session so next login can start fresh
    session_destroy();
    header("location: ./login.php");
    die();
?>