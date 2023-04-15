<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Register Candidate</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>

    <body>
        <div class="container">
            <div class="return"><a href="home_admin.php">Return</a></div>
            <div class="register"><a href="logout.php">Logout</a></div>
            <h1>Welcome!</h1>

            <div class="candidate_form">
                <form name="candidate" method="post" onsubmit="return nameValidation()">

                    <div class="row">
                        <div class="inline_block">
                            <div class="form_label">Candidate's Name</div>
                            <input class="input_text" type="text" name="candidate_name" id="candidate_name" required>
                        </div>
                    </div>

                    <div class="row">
                        <input class="btn" type="submit" formaction="register_candidate.php" name="register_candidate" value="Register">
                    </div>

                    <div class="row">
                        <input class="btn" type="submit" formaction="remove_candidate.php" name="remove_candidate" value="Remove">
                    </div>
                </form>
            </div>
        </div>

        <script>
            function nameValidation() {
                var valid;
                var name = document.getElementById('candidate_name').value;
                var nameRegex = /^[a-zA-Z0-9]{3,20}$/;
                var nameResult = nameRegex.test(name);

                if (!nameResult) {
                    alert("invalid username");
                    valid =  false;
                } else {
                    valid = true;
                }
                return valid;
            }
        </script>
    </body>
</html>
