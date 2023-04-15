<?php
    include "config.php";
    session_start();
    $con = connect();

    //collects current candidates
    $sql = "SELECT name FROM candidates";
    $candidates = $con->query($sql);

    //gets boolean if user has voted already
    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['user']."'";
    $result = $con->query($sql);
    $user = $result->fetch_assoc();
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
                <form name="vote" action="check_vote.php" method="post" onsubmit="userVoted()">
                    <?php
                    foreach ($candidates as $row) {
                        ?>
                        <div class="row">
                            <input type="radio" class="candidate" name="candidates" id="candidates<?php echo $row['name'] ?>" value="<?php echo $row['name'] ?>" required>
                            <label for="candidates<?php echo $row['name']?>"><?php echo $row['name'] ?></label>
                        </div>

                        <?php
                    }
                    ?>
                    <div class="row">
                        <input class="btn" type="submit" name="register_candidate" value="Vote">
                    </div>
                </form>
            </div>
        </div>

        <script>
            //updates user voting history
            function userVoted() {
<!--                --><?php
                    //checks if user has already voted
                    if ($_SESSION['user'].$userVoted == 1) {
                        echo "<script>alert('user already voted. unable to vote twice');</script>";
//                        header("location: thank_you.php");
                    } else {
                        echo "user: " . $_SESSION['user'];
                        //updates user vote count -- unable to vote afterwards
                        $sql = "UPDATE users SET voted = true WHERE username = '".$_SESSION['user']."'";
                        $result = $con->query($sql);

                        //updates user vote history
                        $sql = "UPDATE users SET history = 'test' WHERE username = '".$_SESSION['user']."'";
                        $result = $con->query($sql);
                        header("location: thank_you.php");
                    }
//                ?>
            }
        </script>
    </body>
</html>