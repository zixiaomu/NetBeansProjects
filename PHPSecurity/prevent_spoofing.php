<?php
session_start();
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = md5(uniqid(mt_rand(), true));
}
if (isset($_POST['token'])) {
    if ($_POST['token'] != $_SESSION['token']) {
        echo 'Please enter your password!';
        exit(0);
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
            <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
            <p>Item: <input type="text" name="item" /></p>
            <p>Quantity: <input type="text" name="quantity" /></p>
            <p><input type="submit" value="Submit" /></p>
        </form>
    </body>
</html>

