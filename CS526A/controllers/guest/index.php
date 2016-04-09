<?php
/*  


 * Student Info: Name=YUGENG CHANG, ID=9790

 * Subject: CS526(A)_HWNo_SPRING_2016

 * Author: yugengchang 

 * Filename: add to cart.php 

 * Date and Time: Mar 26, 2016 4:48:20 PM 

 * Project Name: CS526_A__HW5_9790_YUGENG_CHANG 


 */ 
//complete code listing for controllers/guest/index.php
include_once 'models/food_repository.php';
include_once 'models/categorie_repository.php';
include_once 'models/food.php';
include_once 'models/categorie.php';
// Start session management with a persistent cookie
$duration = 60 * 60 * 24 * 7;    // 1 weeks in seconds
//$duration = 0;                // per-session cookie
session_set_cookie_params($duration, '/');
session_start();
$hasAction = isset($_GET['action']);
     unset($_SESSION['login']);

if ($hasAction) {
    $action = $_GET['action'];
} else {
    $action = 'list_foods';
    
}


//$content = include_once "views/navigation_front.php";
$content = include_once "controllers/guest/$action.php";

return $content;
