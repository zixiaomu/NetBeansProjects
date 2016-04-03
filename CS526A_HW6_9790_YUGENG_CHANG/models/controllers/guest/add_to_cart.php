<?php

/*  


 * Student Info: Name=YUGENG CHANG, ID=9790

 * Subject: CS526(A)_HWNo_SPRING_2016

 * Author: yugengchang 

 * Filename: add to cart.php 

 * Date and Time: Mar 26, 2016 4:48:20 PM 

 * Project Name: CS526_A__HW5_9790_YUGENG_CHANG 


 */ 


// Get the action to perform
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    
}

$categories = CategorieRepository::getCategories();
$food_id = $_POST['food_id'];
$food_qty = $_POST['quantity'];

$foods = FoodRepository::getFood($food_id);

// Add or update cart as needed

 if ($action == 'add') {
    $isbn = $food_id;
    $bookqty = $food_qty;
    car::add_book($isbn, $bookqty);
  return  './views/cart_view.php';
  
 } else if ($action == 'update') {
    $new_qty_list = filter_input(INPUT_POST, 'newqty', FILTER_DEFAULT, 
                                     FILTER_REQUIRE_ARRAY);
    foreach ($new_qty_list as $isbn => $qty) {
        if ($_SESSION['shop_cart'][$isbn]['qty'] != $qty) {
            car::update_book($isbn, $qty);
        }
    }
         return  './views/cart_view.php';
} else if ($action == 'add_to_food') {
     return  './views/cart_view.php';
} else  if ($action == 'empty_cart') {
    unset($_SESSION['shop_cart']);
     return  './views/cart_view.php';
}

