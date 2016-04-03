<?php
class DBContext {
    private static $dsn = 'mysql:host=localhost;dbname=food_db2';
    private static $username = 'admin';
    private static $password = 'pass@word';
    private static $db;

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
}
?>
