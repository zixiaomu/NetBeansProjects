<?php

/*


 * Student Info: Name=YUGENG CHANG, ID=9790

 * Subject: CS526(A)_HWNo_SPRING_2016

 * Author: yugengchang 

 * Filename: add to cart.php 

 * Date and Time: Mar 26, 2016 4:48:20 PM 

 * Project Name: CS526_A__HW5_9790_YUGENG_CHANG 


 */
$dsn = 'mysql:3306=127.0.0.1;dbname=food_db2';
$username = 'admin';
$password = 'pass@word';

    $dsn_1 = 'mysql:host=localhost;dbname=securitydb';
    $username= 'admin';
    $password = 'pass@word';
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $db = new PDO($dsn, $username, $password);
    $db_1 = new PDO($dsn_1, $username, $password, $options);

    echo 'Connected.';
} catch (PDOException $ex) {
    $error_msg = $ex->getMessage();
    include('db_error.php');
    exit();
}


