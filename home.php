<?php
    session_start();
    //include database connection file
    if (isset($_SESSION['username'])) {
        $username = $_SESSION["username"];
        session_write_close();
    } else {
        //user is not registered
        //will redirect to 'index'/login page
        session_unset();
        session_write_close();
        $url = "./index.php";
        header("Location: $url");
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <TITLE>Welcome</TITLE>
        <link href="assets/css/phppot-style.css" type="text/css"
              rel="stylesheet" />
        <link href="assets/css/registration.css" type="text/css"
              rel="stylesheet" />
    </head>
    <body>
        <div class="phppot-container">
            <div class="page-header">
                <span class="login-signup"><a href="logout.php">Logout</a></span>
            </div>
            <div class="page-content">Welcome <?php echo $username;?></div>
        </div>
    </body>
</html>