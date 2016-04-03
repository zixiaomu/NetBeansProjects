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
    /* Hash the password. */
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    /* Allow alphanumeric usernames. */
    if (ctype_alnum($_POST['username'])) {
        $data['username'] = $_POST['username'];
    } else {
        echo 'Bad input';
        exit();
    }
    /* Store user in the database. */
    $st = $db->prepare('INSERT
            INTO   users (username, password)
            VALUES (?, ?)');
    $st->execute(array($data['username'], $hashed_password));
    echo 'Thank you!';
    exit();
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
            <p><input type="submit" value="Register" /></p>
        </form>
    </body>
</html>
