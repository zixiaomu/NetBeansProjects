<?php
/*  


 * Student Info: Name=YUGENG CHANG, ID=9790

 * Subject: CS526(A)_HWNo_SPRING_2016

 * Author: yugengchang 

 * Filename: add to cart.php 

 * Date and Time: Mar 26, 2016 4:48:20 PM 

 * Project Name: CS526_A__HW5_9790_YUGENG_CHANG 


 */ 
$food_id = 1;
if (isset($_GET['food_id'])) {
    $food_id = $_GET['food_id'];
}
$categories = CategorieRepository::getCategories();
$food_id = $_GET['food_id'];
$food = FoodRepository::getFood($food_id);
return 'views/food_view.php';