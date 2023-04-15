<?php
    include "config.php";
    session_start();
    $con = connect();

    //collect top 2 voted
    //https://www.simplilearn.com/tutorials/sql-tutorial/second-highest-salary-in-sql#:~:text=To%20find%20the%20second%20highest%20salary%20in%20the%20above%20table,second%20highest%20salary%20in%20SQL.
    $sqlTop = "SELECT MAX(votes) FROM candidates";
    $sqlSec = "SELECT MAX(votes) FROM candidates WHERE votes < (SELECT MAX(votes) FROM candidates)";
    $top = $con->query($sqlTop);
    //foreach ($top as $row) {
    //    echo $row[0];
    //}
    $sec = $con->query($sqlSec);

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Results: Lowest</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>

    <body>
        <div class="container">
            <div class="register"><a href="logout.php">Logout</a></div>
            <h1>Top 2 Most Voted</h1>

            <form name="results" action="results.php" method="post">
                <div class="row">
                    <div class="inline_block">
                        <div class="form_label">Top: <?php
                            // Execute the SQL query and store the result set in $result
                            $result = mysqli_query($con, "SELECT * FROM candidates");

                            // Initialize a variable to hold the candidate with the highest number of votes
                            $top_candidate = null;

                            // Loop through the result set to find the candidate with the highest number of votes
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($top_candidate == null || $row['votes'] > $top_candidate['votes']) {
                                    $top_candidate = $row;
                                }
                            }

                            // Filter the candidates by the number of votes of the top candidate
                            $sql = "SELECT name FROM candidates WHERE votes = '" . $top_candidate['votes'] . "'";
                            $top?></div>

                    </div>
                </div>

                <div class="row">
                    <input class="btn" type="submit" name="complete" value="Return">
                </div>
            </form>
        </div>
    </body>
</html>