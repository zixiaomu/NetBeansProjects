<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dsn = 'mysql:host=localhost;dbname=securitydb';
    $username = 'admin';
    $password = 'pass@word';
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $db = new PDO($dsn, $username, $password, $options);
    } catch (PDOException $ex) {
        echo 'db error';
        exit();
    }

    /* Initialize an array for filtered data. */
    $data = array();
    /* Allow alphanumeric usernames. */
    if (ctype_alnum($_POST['username'])) {
        $data['username'] = $_POST['username'];

        $stmt = $db->prepare('SELECT password
                      FROM   users
                      WHERE  username = ?');
        $stmt->execute(array($data['username']));
        $hashed_password = $stmt->fetchColumn();
        if (password_verify($_POST['password'], $hashed_password)) {
            echo "Login OK!";
            exit();
        } else {
            echo "Login failed";
        }
    } else {
        echo 'Invalid input';
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="" method="POST">
            Username: <input type="text" name="username" /><br>            
            Password: <input type="password" name="password" /><br>          
            <p><input type="submit" value="Login" /></p>
        </form>
    </body>
</html>
