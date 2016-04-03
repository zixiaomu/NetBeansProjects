<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function get_users() {
    global $db;
    $query = 'SELECT user_id, first_name, picture FROM social_user WHERE first_name IS NOT NULL ORDER BY join_date DESC LIMIT 5';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_user($username, $password) {
    global $db;
    $query = 'SELECT user_id, username FROM social_user
              WHERE username = :username AND password = :password';
    try {
        $password = sha1($password);
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_user_by_username($username) {
    global $db;
    $query = "SELECT * FROM social_user WHERE username = '$username'";
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_user_by_userid($user_id) {
    global $db;
    $query = "SELECT * FROM social_user WHERE user_id = '$user_id'";
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function add_user($username, $password) {
    global $db;
    $query = "INSERT INTO social_user (username, password, join_date) "
            . "VALUES (:username, :password, NOW())";

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', sha1($password));
        //$statement->bindValue(':join_date', NOW());
        $statement->execute();
        $statement->closeCursor();

        // Get the last product ID that was automatically generated
        $user_id = $db->lastInsertId();
        return $user_id;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_user($first_name, $last_name, $gender, $birthdate, $city, $state, $new_picture) {
    global $db;
    if (!empty($new_picture)) {
        $query = "UPDATE social_user SET first_name = '$first_name', last_name = '$last_name', gender = '$gender', " .
                " birthdate = '$birthdate', city = '$city', state = '$state', picture = '$new_picture' WHERE user_id = '" . $_SESSION['user_id'] . "'";
    } else {
        $query = "UPDATE social_user SET first_name = '$first_name', last_name = '$last_name', gender = '$gender', " .
                " birthdate = '$birthdate', city = '$city', state = '$state' WHERE user_id = '" . $_SESSION['user_id'] . "'";
    }
    try {
        $db->exec($query);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>

