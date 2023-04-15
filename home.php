<?php
    //starts or continues session
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
            <h1>Welcome!</h1>
            <h3>cheer for your candidate</h3>
            <div class="voting_form">
                <form name="go_vote" action="validate_vote.php" method="post">
                    <div class="row">
                        <div class="home_label">Go Vote!</div>
                        <input class="btn" type="submit" name="go_vote" value="Vote">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>