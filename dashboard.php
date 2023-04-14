<?php
    include "config.php";
    session_start();
    $con = connect();

    //collects current candidates
    $sql = "SELECT * FROM candidates";
    $result = $con->query($sql);
    $candidates = $result->fetch_assoc();
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
            <div class="register"><a href="logout.php">Logout</a></div>
            <h1>may the odds be ever in your favour</h1>

            <div class="vote_form">
                <form name="vote" action="./thank_you.php" method="post" onsubmit="return isChecked()">
                    <?php
                    foreach ($candidates as $row) {
//                echo "<tr><td>".$row['name']."</td></tr>";
                        ?>
                        <div class="row">


                            <input type="radio" class="candidate" name="candidates" id="candidates<?php echo $row[0] ?>" value="<?php echo $row[0] ?>" required="required">
                            <label for="candidates<?php echo $row[0]?>"></label>
                            <!--                    <br>-->
                            <!--                    <input type="radio" class="candidate">-->
                            <!--                    <label>test1</label>-->
                            <!--                    <input type="radio" class="candidate">-->
                            <!--                    <label>test2</label>-->
                        </div>

                        <?php
                    }
                    ?>

                    <div class="row">
                        <input class="btn" type="submit" name="register_candidate" value="Register">
                    </div>
                </form>
            </div>
        </div>

        <script>
            function isChecked() {
                return ($('input[type=radio]:checked').size > 0);
            }
        </script>
    </body>
</html>