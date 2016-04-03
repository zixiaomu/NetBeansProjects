<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign up</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <h3>Sign Up</h3>

        <?php
        require('/model/appvars.php');
        require('/model/db_connect.php');
        require('/model/user_repository.php');

        if (isset($_POST['submit'])) {
            // Grab the profile data from the POST
            $username = trim($_POST['username']);
            $password1 = trim($_POST['password1']);
            $password2 = trim($_POST['password2']);

            if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
                // Make sure someone isn't already registered using this username
                $users = get_user_by_username($username);
                if ($users == false) {
                    // The username is unique, so insert the data into the database
                    add_user($username, $password1);

                    // Confirm success with the user
                    echo '<p>Your new account has been successfully created. You\'re now ready to <a href="login.php">log in</a>.</p>';
                    exit();
                } else {
                    // An account already exists for this username, so display an error message
                    echo '<p class="error">An account already exists for this username. Please use a different address.</p>';
                    $username = "";
                }
            } else {
                echo '<p class="error">You must enter all of the sign-up data, including the desired password twice.</p>';
            }
        }
        ?>

        <p>Please enter your username and desired password to sign up to Social Network.</p>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <fieldset>
                <legend>Registration Info</legend>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br />
                <label for="password1">Password:</label>
                <input type="password" id="password1" name="password1" /><br />
                <label for="password2">Password (retype):</label>
                <input type="password" id="password2" name="password2" /><br />
            </fieldset>
            <input type="submit" value="Sign Up" name="submit" />
        </form>
    </body>
</html>
