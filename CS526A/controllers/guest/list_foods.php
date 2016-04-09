<?php
/*  


 * Student Info: Name=YUGENG CHANG, ID=9790

 * Subject: CS526(A)_HWNo_SPRING_2016

 * Author: yugengchang 

 * Filename: add to cart.php 

 * Date and Time: Mar 26, 2016 4:48:20 PM 

 * Project Name: CS526_A__HW5_9790_YUGENG_CHANG 


 */ 
$categorie_id = 1;
if (isset($_GET['categorie_id'])) {
    $categorie_id = $_GET['categorie_id'];
}
$categories = CategorieRepository::getCategories();
$categorie = CategorieRepository::getCategorie($categorie_id);
$foods = FoodRepository::getFoodsByCategorie($categorie_id);
return 'views/food_list_view.php';

