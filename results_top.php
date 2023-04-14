<?php
    include "config.php";
    session_start();
    $con = connect();

    //collect top 2 voted
    //https://www.simplilearn.com/tutorials/sql-tutorial/second-highest-salary-in-sql#:~:text=To%20find%20the%20second%20highest%20salary%20in%20the%20above%20table,second%20highest%20salary%20in%20SQL.
    $sqlTop = "SELECT MAX(votes), name FROM candidates";
    $sqlSec = "SELECT MAX(votes), name FROM candidates WHERE votes < (SELECT MAX(votes) FROM candidates)";

    $top = $con->query($sqlTop);
    $result = $top->fetch_assoc();

    $sec = $con->query($sqlSec);
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Results: Top 2</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>

    <body>
        <div class="container">
            <div class="register"><a href="logout.php">Logout</a></div>
            <h1>Top 2 Most Voted</h1>

            <form name="results" action="results.php" method="post">
                <div class="row">
                    <div class="inline_block">
                        <div class="form_label">Top: <?php echo"$result[name]"?></div>

                    </div>
                </div>

                <div class="row">
                    <input class="btn" type="submit" name="complete" value="Return">
                </div>
            </form>
        </div>
    </body>
</html>
