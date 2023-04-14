<?php
    include "config.php";
    session_start();
    $con = connect();

    //checks if user has already voted
    if ()

    //collects current candidates
    $sql = "SELECT name FROM candidates";
    $candidates = $con->query($sql);
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
                <form name="vote" action="" method="post" onsubmit="userVoted()">
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
                <?php
                    echo "user: " . $_SESSION['user'];
                    //updates user vote count -- unable to vote afterwards
                    $sql = "UPDATE users SET history = 'test' WHERE username = '".$_SESSION['user']."'";
                    $result = $con->query($sql);

                    //updates user vote history
//                    $sql = "UPDATE users SET history = '' WHERE username = '".$_SESSION['user']."'";
//                    $result = $con->query($sql);
                ?>

                echo "$("btn").click(function(e) {
                    $("input").filter(function(i, el) {
                        return $(el).data("value") === $(e.target).data("value")
                    }).prop("checked", true)
                })";
            }
        </script>
    </body>
</html>