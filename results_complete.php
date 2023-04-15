<?php
    include "config.php";
    session_start();
    $con = connect();
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Results: Complete</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>

    <body>
        <div class="container">
            <div class="register"><a href="logout.php">Logout</a></div>
            <h1>Complete Results</h1>

            <form name="results" action="results.php" method="post">
                <div class="row">
                    <div class="inline_block">
                        <?php
                        //collects all voted data
                        $query = "SELECT * FROM candidates;";
                        $result = $con->query($query);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_array()) {
                                ?>
                                <tr>
                                    <td><?php echo $row['name']?></td>
                                    <td><?php echo $row['votes']?></td>
                                </tr>
                                <br>
                            <?php	}
                        }else{
                            echo "<h2>No record found!</h2>";
                        } ?>


                    </div>
                </div>

                <div class="row">
                    <input class="btn" type="submit" name="complete" value="Return">
                </div>
            </form>
        </div>
    </body>
</html>
