<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>

    <body>
        <div class="container">
            <div class="return"><a href="home_admin.php">Return</a></div>
            <div class="register"><a href="logout.php">Logout</a></div>
            <h1>Welcome!</h1>

            <div class="row">
                <div class="inline_block">
                    <div class="form_label">User</div>
                    <input class="input_text" type="text" name="user" id="user" required>
                </div>
            </div>

            <div class="is_admin">
                <form name="admin" action="delete_user.php" method="post">
                    <div class="row">
                        <div class="home_label">Admin Rights</div>
                        <input class="btn" type="submit" name="admin" value="Update">
                    </div>
                </form>
            </div>

            <div class="delete_user">
                <form name="go_vote" action="update_user.php" method="post" onsubmit="">
                    <div class="row">
                        <div class="home_label">Delete Account</div>
                        <input class="btn" type="submit" name="delete_user" value="Update">
                    </div>
                </form>
            </div>
        </div>

        <script>
        </script>
    </body>
</html>
