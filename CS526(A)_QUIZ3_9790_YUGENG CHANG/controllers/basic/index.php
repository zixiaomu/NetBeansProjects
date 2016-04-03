<?php

include_once 'models/calculator.php';
$lista_enter = array(
    "Alabama",
    "Montana",
   "Alaska",
    "Arizona"
);
$hasPass = isset($_POST['pass']);
$hasindex = isset($_POST['index']);
if ($hasindex)
{
    $index=$_POST['index'];
}
else
{
    
   $index=0;
}

$hasAction = isset($_POST['action']);
if ($hasAction) {
    $action = $_POST['action'];
} else {
    $action = 'show_calculator';
}
$hasEnter = isset($_POST['enter']);

$hasKey = isset($_POST['key']);
if ($hasKey) {
    $key = $_POST['key'];
} else {

    
    shuffle($lista_enter);
    $key = $lista_enter[$index];
   
}
if ($hasPass) {
    $pass = $_POST['pass'];
} else {
    $pass = 'no';
}
if ($hasEnter) {
    $enter = $_POST['enter'];
    echo 'enter is :';
   echo $enter;
  
        $ch = new Calculator();
        if ($ch->check($key, $enter)=='1') {
            echo 'pass yes';
            $pass = 'yes';
        } else {

            $pass = 'no';
        
    }
}

if ($action == 'next' && $pass == 'yes') {
    echo 'next';
    $key = $lista_enter[$index+1];
}

$content = include_once "controllers/basic/$action.php";
return $content;
