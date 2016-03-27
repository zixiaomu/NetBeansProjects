<?php
include_once 'models/calculator.php';

$hasAction = isset($_POST['action']);
if ($hasAction) {
    $action = $_POST['action'];
} else {
    $action = 'show_calculator';
}
if (cal->)

$content = include_once "controllers/basic/$action.php";
return $content;
