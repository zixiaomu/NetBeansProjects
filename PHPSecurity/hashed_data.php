<?php
/* Define a salt. */
define('SALT', 'youlovenpu');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $token = 'secret';
    $hashed_token = hash_hmac('sha1', $token, SALT);
} else {
    if (hash_hmac('sha1', $_POST['token'], SALT) === $_POST['hashed_token']) {
        echo 'Welcome back!';
    } else {
        echo 'Bad user!';
    }
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
            <input type="hidden" name="token" 
                   value="<?php echo $token; ?>"/><br>          
            <input type="hidden" name="hashed_token" 
                   value="<?php echo $hashed_token; ?>"/><br>          
            <p><input type="submit" value="Submit" /></p>
        </form>
    </body>
</html>
