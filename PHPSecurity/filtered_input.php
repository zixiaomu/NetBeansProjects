<?php
$filters = array('item' => array('filter' => FILTER_VALIDATE_REGEXP,
        'options' => array('regexp' => '/^[a-z]+$/i')),
    'quantity' => array('filter' => FILTER_VALIDATE_INT,
        'options' => array('min_range' => 13)));
$clean = filter_input_array(INPUT_POST, $filters);
print_r($clean);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="" method="POST">
            <p>Item: <input type="text" name="item" /></p>
            <p>Quantity: <input type="text" name="quantity" /></p>
            <p><input type="submit" value="Submit" /></p>
        </form>
    </body>
</html>