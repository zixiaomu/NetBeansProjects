<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="prevent_spoofing.php" method="POST">
            <input type="hidden" name="token" value="<?php echo '1234'; ?>" />
            <p><input type="submit" value="Submit" /></p>
        </form>
    </body>
</html>

