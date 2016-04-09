<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if ($_SESSION['login']!=1)
{
    include_once 'views/login_view.php';

}
    /* Initialize an array for filtered data. */
    $data = array();
    /* Allow alphanumeric usernames. */
    if (ctype_alnum($_POST['username'])) {
        $data['username'] = $_POST['username'];

        $stmt = $db_1->prepare('SELECT password
                      FROM   users
                      WHERE  username = ?');
        $stmt->execute(array($data['username']));
        
        $hashed_password = $stmt->fetchColumn();

        if ((password_verify($_POST['password'], $hashed_password))) {
            echo "Login OK!";
                $_SESSION['login'] =1;
                return  include_once "controllers/admin/list_foods.php" ;
           
        } else {
            echo "Login failed";
                 $_SESSION['login'] =0;
            return 'views/login_view.php';

        }
    } else {
        echo 'Invalid input';
                         $_SESSION['login'] =0;

       return 'views/login_view.php';

    }

