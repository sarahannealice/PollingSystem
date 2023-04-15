<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edit Account</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>

    <body>
        <div class="container">
            <div class="return"><a href="home_admin.php">Return</a></div>
            <div class="register"><a href="logout.php">Logout</a></div>
            <h1>Edit User Account</h1>

            <div class="edit_user">
                <form name="admin" action="" method="post">
                    <div class="row">
                        <div class="inline_block">
                            <div class="form_label">User</div>
                            <input class="input_text" type="text" name="user" id="user" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="home_label">Enable Admin Rights</div>
                        <!--formaction -- https://stackoverflow.com/a/46246125-->
                        <input class="btn" type="submit" formaction="enable_admin.php" name="admin" value="Update">
                    </div>

                    <div class="row">
                        <div class="home_label">Disable Admin Rights</div>
                        <!--formaction -- https://stackoverflow.com/a/46246125-->
                        <input class="btn" type="submit" formaction="disable_admin.php" name="admin" value="Update">
                    </div>

                    <div class="row">
                        <div class="home_label">Delete Account</div>
                        <input class="btn" type="submit" formaction="delete_user.php" name="delete_user" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
