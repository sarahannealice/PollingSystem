<?php
?>

<!doctype html>
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

            <div class="candidate_form">
                <form name="candidate" action="./register_candidate.html" method="post" onsubmit="">
                    <div class="row">
                        <div class="home_label">Register Candidate</div>
                        <input class="btn" type="submit" name="register_candidate" value="Register">
                    </div>
                </form>
            </div>

            <div class="voting_form">
                <form name="go_vote" action="vote_prep.php" method="post" onsubmit="">
                    <div class="row">
                        <div class="home_label">Go Vote!</div>
                        <input class="btn" type="submit" name="go_vote" value="Vote">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>