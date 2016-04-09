<?php
/*  


 * Student Info: Name=YUGENG CHANG, ID=9790

 * Subject: CS526(A)_HWNo_SPRING_2016

 * Author: yugengchang 

 * Filename: add to cart.php 

 * Date and Time: Mar 26, 2016 4:48:20 PM 

 * Project Name: CS526_A__HW5_9790_YUGENG_CHANG 


 */ 
include_once "models/PageData.php";
$pageData = new PageData();
$pageData->title = "Sunny Pet Store";
$pageData->addCSS('css/layout.css');
$pageData->addCSS('css/navigation.css');

//connect to database
include_once "db/dbcontext.php";
$db = DBContext::getDB();
$db_1 = DBContext::getDB_1();

echo 'controller is ';
var_dump($_GET["controller"]);
$pageData->navigation = include_once "views/navigation_front.php";
$navigationIsClicked = isset($_GET["controller"]);
if ($navigationIsClicked) {
    $controller = $_GET["controller"];
} else {
    $controller = "guest";
}
$pageData->content = include_once "controllers/$controller/index.php";
include_once "views/page.php";
