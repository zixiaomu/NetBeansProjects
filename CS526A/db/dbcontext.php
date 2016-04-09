<?php
/*  


 * Student Info: Name=YUGENG CHANG, ID=9790

 * Subject: CS526(A)_HWNo_SPRING_2016

 * Author: yugengchang 

 * Filename: add to cart.php 

 * Date and Time: Mar 26, 2016 4:48:20 PM 

 * Project Name: CS526_A__HW5_9790_YUGENG_CHANG 


 */ 
class DBContext {
    private static $dsn = 'mysql:host=localhost;dbname=food_db2';
    private static $username = 'admin';
    private static $password = 'pass@word';
    private static $db;
    private static $db_1;    
    private static$dsn_1 = 'mysql:host=localhost;dbname=securitydb';



    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_msg = $e->getMessage();
                include('db_error.php');
                exit();
            }
            
        }
        return self::$db;
    }
       public static function getDB_1 () {
        if (!isset(self::$db_1)) {
            try {
                self::$db_1 = new PDO(self::$dsn_1,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_msg = $e->getMessage();
                include('db_error.php');
                exit();
            }
            
        }
        return self::$db_1;
    }
}
?>
