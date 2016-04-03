<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$dsn = 'mysql:host=localhost;dbname=social_db1';
$username_conn = 'admin';
$password_conn = 'pass@word';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $db = new PDO($dsn, $username_conn, $password_conn, $options);
    //echo 'Connected.';
} catch (PDOException $ex) {
    $error_msg = $ex->getMessage();
    include('/errors/db_error.php');
    exit();
}

function display_db_error($error_message) {
    global $app_path;
    include '/errors/db_error.php';
    exit;
}
        
?>
