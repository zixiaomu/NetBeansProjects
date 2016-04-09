<?php

/*  


 * Student Info: Name=YUGENG CHANG, ID=9790

 * Subject: CS526(A)_HWNo_SPRING_2016

 * Author: yugengchang 

 * Filename: add to cart.php 

 * Date and Time: Mar 26, 2016 4:48:20 PM 

 * Project Name: CS526_A__HW5_9790_YUGENG_CHANG 


 */ 
include_once 'models/food_repository.php';
include_once 'models/categorie_repository.php';
include_once 'models/food.php';
include_once 'models/categorie.php';
if ($_POST['food_id']==NULL)
{
    return  './views/cart_view.php';
}

if (empty($_SESSION['shop_cart'])) {
    $_SESSION['shop_cart'] = array();
}

// Get the action to perform
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    
}

$food_id = $_POST['food_id'];
$food_qty = $_POST['quantity'];
echo "food_id is $food_id";
$categories = CategorieRepository::getCategories();

$foods = FoodRepository::getFood($food_id);

$cart = array();

if (NULL!== $foods->getISBN() ) {
    $ISBN=$foods->getISBN();
    $TITLE=$foods->getTitle();
    $PRICE=$foods->getPrice();
    $cart["$ISBN"] = array('title' => "$TITLE ", 'price' =>"$PRICE");

}

require_once('./models/cart.php');

// Add or update cart as needed

 if ($action == 'add') {
    $isbn = $ISBN;
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
} 


