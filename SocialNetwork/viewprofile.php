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
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Profile</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <h3>Social Network - View Profile</h3>

        <?php
        require('/model/appvars.php');
        require('/model/db_connect.php');
        require('/model/user_repository.php');

        // Make sure the user is logged in before going any further.
        if (!isset($_SESSION['user_id'])) {
            echo '<p class="login">Please <a href="login.php">log in</a> to access this page.</p>';
            exit();
        } else {
            echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '. <a href="logout.php">Log out</a>.</p>');
        }

        // Grab the profile data from the database
        if (!isset($_GET['user_id'])) {
            $user_id = $_SESSION['user_id'];
        } else {
            $user_id = $_GET['user_id'];
        }
        $user = get_user_by_userid($user_id);

        if ($user_id >= 1) {
            // The user user was found so display the user data
            echo '<table>';
            if (!empty($user['username'])) {
                echo '<tr><td class="label">Username:</td><td>' . $user['username'] . '</td></tr>';
            }
            if (!empty($user['first_name'])) {
                echo '<tr><td class="label">First name:</td><td>' . $user['first_name'] . '</td></tr>';
            }
            if (!empty($user['last_name'])) {
                echo '<tr><td class="label">Last name:</td><td>' . $user['last_name'] . '</td></tr>';
            }
            if (!empty($user['gender'])) {
                echo '<tr><td class="label">Gender:</td><td>';
                if ($user['gender'] == 'M') {
                    echo 'Male';
                } else if ($user['gender'] == 'F') {
                    echo 'Female';
                } else {
                    echo '?';
                }
                echo '</td></tr>';
            }
            if (!empty($user['birthdate'])) {
                if (!isset($_GET['user_id']) || ($_SESSION['user_id'] == $_GET['user_id'])) {
                    // Show the user their own birthdate
                    echo '<tr><td class="label">Birthdate:</td><td>' . $user['birthdate'] . '</td></tr>';
                } else {
                    // Show only the birth year for everyone else
                    list($year, $month, $day) = explode('-', $user['birthdate']);
                    echo '<tr><td class="label">Year born:</td><td>' . $year . '</td></tr>';
                }
            }
            if (!empty($user['city']) || !empty($user['state'])) {
                echo '<tr><td class="label">Location:</td><td>' . $user['city'] . ', ' . $user['state'] . '</td></tr>';
            }
            if (!empty($user['picture'])) {
                echo '<tr><td class="label">Picture:</td><td><img src="' . MM_UPLOADPATH . $user['picture'] .
                '" alt="Profile Picture" /></td></tr>';
            }
            echo '</table>';
            if (!isset($_GET['user_id']) || ($_SESSION['user_id'] == $_GET['user_id'])) {
                echo '<p>Would you like to <a href="editprofile.php">edit your profile</a>?</p>';
            }
        } // End of check for a single user of user results
        else {
            echo '<p class="error">There was a problem accessing your profile.</p>';
        }

        ?>
    </body> 
</html>
