<?php

//complete code listing for controllers/guest/index.php
include_once 'models/calculator.php';


$hasAction = isset($_POST['action']);
if ($hasAction) {
    $action = $_POST['action'];
} else {
    $action = 'show_calculator';
}

$x = ' ';
$y = ' ';
$result = ' '; 
 
 
$content = include_once "controllers/Basic/$action.php";
return $content;
