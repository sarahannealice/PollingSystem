<?php
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
            <div class="register"><a href="login.php">Login</a></div>

            <div class="login_form">
                <form name="login" action="config.php" method="post" onsubmit="signupValidation()">
                    <h1>Registration</h1>

                    <div class="row">
                        <div class="inline_block">
                            <div class="form_label">Name</div>
                            <input class="input_text" type="text" name="name">
                        </div>
                    </div>

                    <div class="row">
                        <div class="inline_block">
                            <div class="form_label">Username</div>
                            <input class="input_text" type="text" name="username">
                        </div>
                    </div>

                    <div class="row">
                        <div class="inline_block">
                            <div class="form_label">Password</div>
                            <input class="input_text" type="password" name="password">
                        </div>
                    </div>

                    <div class="row">
                        <div class="inline_block">
                            <div class="form_label">Confirm Password</div>
                            <input class="input_text" type="password" name="password_confirm">
                        </div>
                    </div>

                    <div class="row">
                        <input class="btn" type="submit" name="login-btn" value="Register">
                    </div>
                </form>
            </div>
        </div>


        <!--javascript to validate user input for registration-->
        <script>
            function signupValidation() {
                var valid = true;

                $("#username").removeClass("error-field");
                $("#email").removeClass("error-field");
                $("#password").removeClass("error-field");
                $("#confirm-password").removeClass("error-field");

                var UserName = $("#username").val();
                var email = $("#email").val();
                var Password = $('#signup-password').val();
                var ConfirmPassword = $('#confirm-password').val();
                var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

                $("#username-info").html("").hide();
                $("#email-info").html("").hide();

                if (UserName.trim() == "") {
                    $("#username-info").html("required.").css("color", "#ee0000").show();
                    $("#username").addClass("error-field");
                    valid = false;
                }
                if (email == "") {
                    $("#email-info").html("required").css("color", "#ee0000").show();
                    $("#email").addClass("error-field");
                    valid = false;
                } else if (email.trim() == "") {
                    $("#email-info").html("Invalid email address.").css("color", "#ee0000").show();
                    $("#email").addClass("error-field");
                    valid = false;
                } else if (!emailRegex.test(email)) {
                    $("#email-info").html("Invalid email address.").css("color", "#ee0000")
                        .show();
                    $("#email").addClass("error-field");
                    valid = false;
                }
                if (Password.trim() == "") {
                    $("#signup-password-info").html("required.").css("color", "#ee0000").show();
                    $("#signup-password").addClass("error-field");
                    valid = false;
                }
                if (ConfirmPassword.trim() == "") {
                    $("#confirm-password-info").html("required.").css("color", "#ee0000").show();
                    $("#confirm-password").addClass("error-field");
                    valid = false;
                }
                if(Password != ConfirmPassword){
                    $("#error-msg").html("Both passwords must be same.").show();
                    valid=false;
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
