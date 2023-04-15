<?php
    session_start();
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
      <div class="register"><a href="signup.html">SignUp</a></div>
      <h1>Login</h1>

      <div class="login_form">
        <form name="login" action="check_login.php" method="post" onsubmit="return loginValidation()">

          <div class="row">
            <div class="inline_block">
              <div class="form_label">Username</div>
              <input class="input_text" type="text" name="username" id="username" required>
            </div>
          </div>

          <div class="row">
            <div class="inline_block">
              <div class="form_label">Password</div>
              <input class="input_text" type="password" name="password" id="password" required>
            </div>
          </div>

          <div class="row">
            <input class="btn" type="submit" name="login_btn" value="Login">
          </div>
        </form>
      </div>
    </div>


    <!--javascript to validate user input for registration-->
    <!--https://html.form.guide/snippets/javascript-form-validation-using-regular-expression/-->
    <!--https://www.tutorialspoint.com/How-to-stop-form-submission-using-JavaScript-->
    <script>
      function loginValidation() {
        var valid;
        var username = document.getElementById('username').value;
        var usernameRegex = /^[a-zA-Z0-9]{3,20}$/;
        var usernameResult = usernameRegex.test(username);

        if (!usernameResult) {
          alert("invalid username");
          valid =  false;
        } else {
          valid = true;
        }
        return valid;
      }
    </script>
  </body>
</html>
