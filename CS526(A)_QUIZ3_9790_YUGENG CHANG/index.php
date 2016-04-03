<?php
include_once "models/PageData.php";
include_once "models/Calculator.php";

$pageData = new PageData();
$pageData->title = "NPU Calculator";
$pageData->addCSS('css/layout.css');
$pageData->addCSS('css/navigation.css');




$pageData->navigation = include_once "views/navigation.php";
$navigationIsClicked = isset($_GET["controller"]);
if ($navigationIsClicked) {
    $controller = $_GET["controller"];
} else {
    $controller = "basic";
}
$pageData->content = include_once "controllers/$controller/index.php";
include_once "views/page.php";
