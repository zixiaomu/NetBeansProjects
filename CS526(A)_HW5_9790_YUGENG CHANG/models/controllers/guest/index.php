<?php
//complete code listing for controllers/guest/index.php
include_once 'models/food_repository.php';
include_once 'models/categorie_repository.php';
include_once 'models/food.php';
include_once 'models/categorie.php';

$hasAction = isset($_GET['action']);
if ($hasAction) {
    $action = $_GET['action'];
} else {
    $action = 'list_foods';
}


//$content = include_once "views/navigation_front.php";
$content = include_once "controllers/guest/$action.php";

return $content;
