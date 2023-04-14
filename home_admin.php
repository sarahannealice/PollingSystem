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
            <div class="register"><a href="logout.php">Logout</a></div>
            <h1>Welcome Admin!</h1>

            <div class="candidate">
                <form name="candidate" action="candidate.php" method="post" onsubmit="">
                    <div class="row">
                        <div class="home_label">Register Candidate</div>
                        <input class="btn" type="submit" name="register_candidate" value="Register">
                    </div>
                </form>
            </div>

            <div class="votin">
                <form name="go_vote" action="dashboard.php" method="post" onsubmit="">
                    <div class="row">
                        <div class="home_label">Go Vote!</div>
                        <input class="btn" type="submit" name="go_vote" value="Vote">
                    </div>
                </form>
            </div>

            <div class="display_results">
                <form name="results" action="results.php" method="post" onsubmit="">
                    <div class="row">
                        <div class="home_label">Display Results</div>
                        <input class="btn" type="submit" name="results" value="Results">
                    </div>
                </form>
            </div>

            <div class="edit_user">
                <form name="edit_user" action="edit.html" method="post" onsubmit="">
                    <div class="row">
                        <div class="home_label">Edit User</div>
                        <input class="btn" type="submit" name="edit_user" value="Edit">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>