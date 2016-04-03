<?php
    $comment = filter_input(INPUT_POST, 'comment');
    if ($comment == NULL || $comment == FALSE) {
        $comment =  '';
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
            <p>Enter your comment:</p>
            <textarea rows="4" cols="50" name="comment"></textarea>
            <p><input type="submit" value="Submit" /></p>
        </form>
        <hr>
        You entered: <?php echo $comment; ?>
        
    </body>
</html>