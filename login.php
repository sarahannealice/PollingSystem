<?php
    session_start();

    //include database connectivity
    $con = include_once('config.php');

    if (isset($_POST['submit'])) {
        $errorMsg = "";

        $username = $_POST["username"];
        $password = $_POST["password"];

        if (!empty($username) && !empty($password)) {
            $query = "SELECT * FROM user_credentials WHERE username = '$username' AND password = '$password'";
            $result = $con->query($query);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } else {
                $errorMsg = "no user found";
            }
        } else {
            //although unnecessary, keeping as a backup
            $errorMsg = "username and password required";
        }
    }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>

    <body>
        <div class="container">
            <div class="register"><a href="registration.php">Register</a></div>

            <div class="login_form">
                <form name="login" action="config.php" method="post" onsubmit="loginValidation()">
                    <h1>Login</h1>

                    <div class="row">
                        <div class="inline_block">
                            <div class="form_label">Username</div>
                            <input class="input_text" type="text" name="username" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="inline_block">
                            <div class="form_label">Password</div>
                            <input class="input_text" type="password" name="password" required>
                        </div>
                    </div>

                    <div class="row">
                        <input class="btn" type="submit" name="login-btn" value="Login">
                    </div>
                </form>
            </div>
        </div>


        <!--javascript to validate user input for registration-->
        <script>
            function loginValidation() {
                var valid = true;
                $("#username").removeClass("error-field");
                $("#password").removeClass("error-field");

                var UserName = $("#username").val();
                var Password = $('#login-password').val();

                $("#username-info").html("").hide();

                if (UserName.trim() == "") {
                    $("#username-info").html("required.").css("color", "#ee0000").show();
                    $("#username").addClass("error-field");
                    valid = false;
                }
                if (Password.trim() == "") {
                    $("#login-password-info").html("required.").css("color", "#ee0000").show();
                    $("#login-password").addClass("error-field");
                    valid = false;
                }
                if (valid == false) {
                    $('.error-field').first().focus();
                    valid = false;
                }
                return valid;
            }
        </script>
    </body>
</html>
