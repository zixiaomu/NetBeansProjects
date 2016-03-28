<?php
include_once "models/PageData.php";
$pageData = new PageData();
$pageData->title = "Sunny Pet Store";
$pageData->addCSS('css/layout.css');
$pageData->addCSS('css/navigation.css');

//connect to database
include_once "db/dbcontext.php";
$db = DBContext::getDB();

// Start session management with a persistent cookie
$duration = 60 * 60 * 24 * 7;    // 1 weeks in seconds
//$duration = 0;                // per-session cookie
session_set_cookie_params($duration, '/');
session_start();

// Include cart functions
require_once('./models/cart.php');
// Create a cart array if needed
if (empty($_SESSION['shop_cart'])) {
    $_SESSION['shop_cart'] = array();
}
$pageData->navigation = include_once "views/navigation_front.php";
$navigationIsClicked = isset($_GET["controller"]);
if ($navigationIsClicked) {
    $controller = $_GET["controller"];
} else {
    $controller = "guest";
}
$pageData->content = include_once "controllers/$controller/index.php";
include_once "views/page.php";
