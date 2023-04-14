<?php
    include "config.php";
    session_start();
    $con = connect();

    echo "user: " . $_SESSION['user'];
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Results</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>

    <body>
        <div class="container">
            <div class="register"><a href="logout.php">Logout</a></div>
            <h1>Check out the Results!</h1>

            <div class="top_votes">
                <form name="top_votes" action="results_top.php" method="post">
                    <div class="row">
                        <div class="home_label">Top 2 Most Voted</div>
                        <input class="btn" type="submit" name="top_votes" value="Tally">
                    </div>
                </form>
            </div>

            <div class="lowest_votes">
                <form name="lowest_votes" action="results_bot.php" method="post">
                    <div class="row">
                        <div class="home_label">Least Voted Candidate</div>
                        <input class="btn" type="submit" name="lowest_votes" value="Tally">
                    </div>
                </form>
            </div>

            <div class="complete">
                <form name="complete" action="results_complete.php" method="post">
                    <div class="row">
                        <div class="home_label">Complete Results</div>
                        <input class="btn" type="submit" name="complete" value="Tally">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>