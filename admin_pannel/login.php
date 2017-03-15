<link media="screen" rel="stylesheet" type="text/css" href="css/login.css" />
<script src="js/prefixfree.min.js"></script>
<?php

    // configuration
	require("config.php");


    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        require("templates/login_form.php");
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["username"]))
        {
            echo "<h3>You must provide your username.</h3><h3><a href='login.php'>try again</a></h3>";
        }
        else if (empty($_POST["password"]))
        {
            echo "<h3>You must provide your password.</h3><h3><a href='login.php'>try again</a></h3>";
        }
		else
		{
        // query database for user
        $rows = query("SELECT * FROM users WHERE username = ?", $_POST["username"]);

        // if we found user, check password
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];
			

            // compare hash of user's input against hash that's in database
            if (crypt($_POST["password"], $row["hash"]) == $row["hash"])
            {
                // remember that user's now logged in by storing user's ID in session
                $_SESSION["id"] = $row["id"];

                // redirect to secret.php
                redirect("secret.php");
            }
        }

        // else apologize
        echo "<h3>Invalid username and/or password.</h3><h3><a href='login.php'>try again</a></h3>";
		}
    }

?>
<script src="js/index.js"></script>