<?php
session_start();

// If the session vars aren't set, try to set them with a cookie
if (!isset($_SESSION['user_id'])) {
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
        $_SESSION['user_id'] = $_COOKIE['user_id'];
        $_SESSION['username'] = $_COOKIE['username'];
    }
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Social Network</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <h3>Social Network - Where you can find your friends!</h3>
        <?php
        require('/model/appvars.php');
        require('/model/db_connect.php');
        require('/model/user_repository.php');

        // Generate the navigation menu
        if (isset($_SESSION['username'])) {
            echo '&#10084; <a href="viewprofile.php">View Profile</a><br />';
            echo '&#10084; <a href="editprofile.php">Edit Profile</a><br />';
            echo '&#10084; <a href="logout.php">Log Out (' . $_SESSION['username'] . ')</a>';
        } else {
            echo '&#10084; <a href="login.php">Log In</a><br />';
            echo '&#10084; <a href="signup.php">Sign Up</a>';
        }

        // Retrieve the user data from MySQL
        $users = get_users();
        
        // Loop through the array of user data, formatting it as HTML
        echo '<h4>Latest members:</h4>';
        echo '<table>';
        foreach ($users as $user) {
            if (is_file(MM_UPLOADPATH . $user['picture']) && filesize(MM_UPLOADPATH . $user['picture']) > 0) {
                echo '<tr><td><img src="' . MM_UPLOADPATH . $user['picture'] . '" alt="' . $user['first_name'] . '" /></td>';
            } else {
                echo '<tr><td><img src="' . MM_UPLOADPATH . 'nopic.jpg' . '" alt="' . $user['first_name'] . '" /></td>';
            }
            if (isset($_SESSION['user_id'])) {
                echo '<td><a href="viewprofile.php?user_id=' . $user['user_id'] . '">' . $user['first_name'] . '</a></td></tr>';
            } else {
                echo '<td>' . $user['first_name'] . '</td></tr>';
            }
        }
        echo '</table>';
        ?>
    </body>
</html>
