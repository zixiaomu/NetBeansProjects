<!DOCTYPE html>

<!-- 


Student Info: Name=YUGENG CHANG, ID=9790

Subject: CS526(A)_HWNo_SPRING_2016

Author: yugengchang 

Filename: index.php 

Date and Time: Mar 11, 2016 7:09:55 PM 

Project Name: calac 


--> 

<?php
include_once "models/PageData.php";
$pageData = new PageData();
$pageData->title = "Calcultor Application";
$pageData->addCSS('css/layout.css');
$pageData->addCSS('css/navigation.css');



$pageData->navigation = include_once "views/navigation_front.php";
$navigationIsClicked = isset($_GET["controller"]);
if ($navigationIsClicked) {
    $controller = $_GET["controller"];
} else {
    $controller = "basic";
}
$pageData->content = include_once "controllers/$controller/index.php";
include_once "views/page.php";
