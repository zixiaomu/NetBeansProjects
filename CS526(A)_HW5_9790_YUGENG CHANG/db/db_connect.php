<?php
$dsn = 'mysql:host=localhost;dbname=food_db2';
$username = 'admin';
$password = 'pass@word';

try {
    $db = new PDO($dsn, $username, $password);
    echo 'Connected.';
} catch (PDOException $ex) {
    $error_msg = $ex->getMessage();
    include('db_error.php');
    exit();
}
       
?>
